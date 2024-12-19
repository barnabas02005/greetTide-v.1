(function () {
  const ROUTER_INSTANCE_KEY = "__CLEAN_PAGE_ROUTER_INSTANCE__";

  class CleanPageRouter {
    constructor() {
      if (window[ROUTER_INSTANCE_KEY]) {
        return window[ROUTER_INSTANCE_KEY];
      }

      window[ROUTER_INSTANCE_KEY] = this;

      if (this.initialized) return this;
      this.initialized = true;

      this.cache = new Map();
      this.executedInlineScripts = new Set();

      this.resetConsoleLogging();
      this.init();
    }

    resetConsoleLogging() {
      const originalLog = console.log;
      const loggedMessages = new Set();

      console.log = (...args) => {
        const messageKey = args.map((arg) => String(arg)).join("|");
        if (!loggedMessages.has(messageKey)) {
          originalLog(...args);
          loggedMessages.add(messageKey);
        }
      };
    }

    init() {
      this.removeExistingListeners();

      document.addEventListener("click", this.handleLinkClick.bind(this));
      window.addEventListener("popstate", this.handlePopState.bind(this));

      this.preloadLinks();
      this.lazyLoadImages();
    }

    removeExistingListeners() {
      const events = ["click", "popstate"];
      events.forEach((eventName) => {
        document.removeEventListener(eventName, this.handleLinkClick);
        window.removeEventListener(eventName, this.handlePopState);
      });
    }

    handleLinkClick(e) {
      const link = e.target.closest("a");
      if (link && link.hostname === window.location.hostname) {
        e.preventDefault();
        this.navigateTo(link.href);
      }
    }

    handlePopState() {
      this.loadPage(window.location.href);
    }

    navigateTo(url) {
      if (this.lastLoadedUrl === url) return;

      history.pushState({}, "", url);
      this.loadPage(url);
    }

    loadPage(url) {
      const loaderType = this.getLoaderType();

      this.showLoader(loaderType);

      if (this.cache.has(url)) {
        // Check if cached version should be used or a fresh fetch is needed
        if (this.isCacheStale(url)) {
          this.fetchAndRenderPage(url);
        } else {
          this.renderPage(this.cache.get(url));
          this.hideLoader();
        }
        return;
      }

      this.fetchAndRenderPage(url);
    }

    isCacheStale(url) {
      // Check if the cached HTML content size is significantly smaller than the live version
      const cacheContent = this.cache.get(url);
      if (cacheContent) {
        return fetch(url, { method: "HEAD" }).then((response) => {
          const liveSize = parseInt(response.headers.get("Content-Length"), 10);
          const cacheSize = cacheContent.length;
          return liveSize > cacheSize * 1.2; // Example threshold for cache staleness
        });
      }
      return true;
    }

    fetchAndRenderPage(url) {
      fetch(url)
        .then((response) => {
          if (!response.ok)
            throw new Error(`HTTP error! status: ${response.status}`);
          return response.text();
        })
        .then((html) => {
          this.cache.set(url, html);
          this.renderPage(html, url);
          this.hideLoader();
        })
        .catch((error) => {
          console.error("Page load error:", error);
          this.hideLoader();
          this.handlePageLoadError(error);
        });
    }

    getLoaderType() {
      const metaLoader = document.querySelector('meta[name="loader-type"]');
      return metaLoader ? metaLoader.content : null;
    }

    showLoader(type) {
      if (!type) return;

      const loaderContainer = document.createElement("div");
      loaderContainer.id = "loader-container";
      loaderContainer.className = `loader-${type}`;
      document.body.appendChild(loaderContainer);

      this.addLoaderStyles();
    }

    hideLoader() {
      const loaderContainer = document.getElementById("loader-container");
      if (loaderContainer) {
        loaderContainer.remove();
      }
    }

    addLoaderStyles() {
      if (document.getElementById("loader-styles")) return;

      const style = document.createElement("style");
      style.id = "loader-styles";
      style.textContent = `
          #loader-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(255, 255, 255, 0.8);
            z-index: 9999;
          }
  
          .loader-spinner {
            border: 8px solid rgba(0, 0, 0, 0.1);
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
          }
  
          .loader-linear {
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #3498db, #8e44ad, #e74c3c);
            background-size: 200% 100%;
            animation: slide 1.5s linear infinite;
          }
  
          .loader-gradient {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(45deg, #3498db, #8e44ad, #e74c3c);
            background-size: 400% 400%;
            animation: gradientShift 2s infinite;
          }
  
          @keyframes spin {
            to {
              transform: rotate(360deg);
            }
          }
  
          @keyframes slide {
            to {
              background-position: 200% 0;
            }
          }
  
          @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
          }
        `;
      document.head.appendChild(style);
    }

    renderPage(html, url) {
      const tempDiv = document.createElement("div");
      tempDiv.innerHTML = html;

      const newHead = this.extractHeadContent(tempDiv, html);
      const newBody = this.extractBodyContent(tempDiv, html);

      this.replaceHeadContent(newHead);
      this.replaceBodyContent(newBody);
      this.executeScripts(tempDiv);

      // Dispatch DOMContentLoaded event after rendering
      this.dispatchDOMContentLoaded();

      this.lastLoadedUrl = url;
    }

    dispatchDOMContentLoaded() {
      const event = new Event("DOMContentLoaded", {
        bubbles: true,
        cancelable: true,
      });
      document.dispatchEvent(event);
    }

    extractHeadContent(tempDiv, html) {
      const headMatch = html.match(/<head([^>]*)>([\s\S]*?)<\/head>/i);
      if (headMatch) {
        return {
          attributes: headMatch[1].trim(),
          content: headMatch[2],
        };
      }
      return {
        attributes: "",
        content: "",
      };
    }

    extractBodyContent(tempDiv, html) {
      const bodyMatch = html.match(/<body([^>]*)>([\s\S]*?)<\/body>/i);
      if (bodyMatch) {
        return {
          attributes: bodyMatch[1].trim(),
          content: bodyMatch[2],
        };
      }
      return {
        attributes: "",
        content: html,
      };
    }

    replaceHeadContent(headData) {
      while (document.head.attributes.length > 0) {
        document.head.removeAttribute(document.head.attributes[0].name);
      }

      if (headData.attributes) {
        const attributesString = headData.attributes;
        const attributeMatches = [
          ...attributesString.matchAll(/(\w+)(?:="([^"]*)")?/g),
        ];
        attributeMatches.forEach((match) => {
          const [, name, value] = match;
          if (value !== undefined) {
            document.head.setAttribute(name, value);
          } else {
            document.head.setAttribute(name, "");
          }
        });
      }

      const tempHead = document.createElement("head");
      tempHead.innerHTML = headData.content;
      document.head.innerHTML = "";
      this.updateElements(document.head, tempHead);
    }

    replaceBodyContent(bodyData) {
      while (document.body.attributes.length > 0) {
        document.body.removeAttribute(document.body.attributes[0].name);
      }

      if (bodyData.attributes) {
        const attributesString = bodyData.attributes;
        const attributeMatches = [
          ...attributesString.matchAll(/(\w+)(?:="([^"]*)")?/g),
        ];
        attributeMatches.forEach((match) => {
          const [, name, value] = match;
          if (value !== undefined) {
            document.body.setAttribute(name, value);
          } else {
            document.body.setAttribute(name, "");
          }
        });
      }

      const tempBody = document.createElement("body");
      tempBody.innerHTML = bodyData.content;
      document.body.innerHTML = "";
      this.updateElements(document.body, tempBody);
    }

    updateElements(oldElement, newElement) {
      const oldNodes = Array.from(oldElement.childNodes);
      const newNodes = Array.from(newElement.childNodes);

      oldNodes.forEach((oldNode, index) => {
        if (newNodes[index]) {
          const newNode = newNodes[index];
          if (oldNode.isEqualNode(newNode)) {
            return;
          }

          if (newNode.nodeType === Node.ELEMENT_NODE) {
            if (!this.isNodeIdentical(oldNode, newNode)) {
              oldNode.replaceWith(newNode);
            }
          } else {
            oldNode.replaceWith(newNode);
          }
        } else {
          oldNode.remove();
        }
      });

      newNodes.slice(oldNodes.length).forEach((newNode) => {
        oldElement.appendChild(newNode);
      });
    }

    isNodeIdentical(node1, node2) {
      return (
        node1.nodeType === node2.nodeType &&
        node1.tagName === node2.tagName &&
        node1.isEqualNode(node2)
      );
    }

    executeScripts(tempDiv) {
      const scriptTags = tempDiv.querySelectorAll("script");
      scriptTags.forEach((script) => {
        const scriptContent = script.innerHTML;
        if (!this.executedInlineScripts.has(scriptContent)) {
          const newScript = document.createElement("script");
          newScript.textContent = scriptContent;
          document.head.appendChild(newScript);
          this.executedInlineScripts.add(scriptContent);
        }
      });
    }

    hashScriptContent(content) {
      let hash = 0;
      for (let i = 0; i < content.length; i++) {
        hash = (hash << 5) - hash + content.charCodeAt(i);
        hash |= 0;
      }
      return hash;
    }

    preloadLinks() {
      const links = document.querySelectorAll("a[href]");

      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const url = entry.target.href;
            if (!this.cache.has(url)) {
              fetch(url)
                .then((response) => response.ok && response.text())
                .then((html) => html && this.cache.set(url, html));
            }
          }
        });
      });

      links.forEach((link) => observer.observe(link));
    }

    lazyLoadImages() {
      const images = document.querySelectorAll("img[data-src]");

      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src;
            observer.unobserve(img);
          }
        });
      });

      images.forEach((img) => observer.observe(img));
    }

    handlePageLoadError(error) {
      const errorDiv = document.createElement("div");
      errorDiv.textContent = `Failed to load page: ${error.message}`;
      errorDiv.style.color = "red";
      document.body.appendChild(errorDiv);
    }
  }

  if (!window[ROUTER_INSTANCE_KEY]) {
    new CleanPageRouter();
  }
})();
