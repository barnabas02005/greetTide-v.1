// install ServiceWorker

self.addEventListener('install', installServiceWorker)
cacheKey = 'version 2';
cacheAssets = ['http://localhost/Ecardextract/assets/css/home.css','http://localhost/Ecardextract/pages/index_load.php','http://localhost/Ecardextract/index.php','http://localhost/Ecardextract/pages/home.php','http://localhost/Ecardextract/pages/search.php','http://localhost/Ecardextract/assets/css/theme/light.css','http://localhost/Ecardextract/assets/css/theme/dark.css','http://localhost/Ecardextract/assets/js/cache.js','http://localhost/Ecardextract/info.php']
function installServiceWorker(e)
{
      e.waitUntil(
            caches.open(cacheKey)
            .then((cache) => {
                  cache.addAll(cacheAssets);
                  console.log('Assets added to the cache');
            })
            .then(() => { self.skipWaiting() })
      )
}


self.addEventListener('activate', activateServiceWorker)

function activateServiceWorker(e)
{
      e.waitUntil(
            caches.keys()
            .then(cacheKeys => {
                  return Promise.all(
                        cacheKeys.map((cache) => {
                              if(cache != cacheKeys)
                              {
                                    console.log('Cache cleared.');
                                    return caches.delete(cache);
                              }
                          }
                        )
                  )
            })
      )
}

self.addEventListener('fetch', fetchServiceWorker)

function fetchServiceWorker(e)
{
      e.respondWith(
            fetch(e.request).catch(() => {
                  console.log('Website fetched from cache')
                  return caches.match(e.request)
            })
      )
}

// // install ServiceWorker

self.addEventListener('install', installServiceWorker)
cacheKey = 'version 1';
cacheAssets = [    '/',
'../../pages/signin.php',
'../css/signin.css',
'../js/splash.js',
'../img/logo/redesign_greetide_blob.png',
'../js/cache.js']
function installServiceWorker(e)
{
      e.waitUntil(
            caches.open(cacheKey)
            .then((cache) => {
                  cache.addAll(cacheAssets);
                  console.log('Assets added to the cache');
            })
            .then(() => { self.skipWaiting() })
      )
}


self.addEventListener('activate', activateServiceWorker)

function activateServiceWorker(e)
{
      e.waitUntil(
            caches.keys()
            .then(cacheKeys => {
                  return Promise.all(
                        cacheKeys.map((cache) => {
                              if(cache != cacheKey)
                              {
                                    console.log('Cache cleared.');
                                    return caches.delete(cache);
                              }
                          }
                        )
                  )
            })
      )
}

self.addEventListener('fetch', fetchServiceWorker)

function fetchServiceWorker(e)
{
      e.respondWith(
            fetch(e.request).catch(() => {
                  console.log('Website fetched from cache')
                  return caches.match(e.request)
            })
      )
}

self.addEventListener('push', event => {
  const title = 'Push Notification';
  const options = {
    body: event.data.text()
  };
  event.waitUntil(
    self.registration.showNotification(title, options)
  );
});

self.addEventListener('notificationclick', event => {
  event.notification.close();
  // Add your custom handling for when the notification is clicked
  // For example, open a specific page or trigger an action
	clients.openWindow('https://example.com'); // Change the URL to your desired destination
});

self.addEventListener('notificationclose', event => {
  // Add your custom handling for when the notification is closed without interaction
});
