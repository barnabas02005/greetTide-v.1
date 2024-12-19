// register ServiceWorker

if ('serviceWorker' in navigator)
{
      window.addEventListener('load', registerServiceWorker)
}

function registerServiceWorker()
{
      navigator.serviceWorker.register("./serviceworker.js")
      .then(res => console.log('service Worker Registered')).catch(err => console.log(err))
      
}