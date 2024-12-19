// // install ServiceWorker

// self.addEventListener('install', installServiceWorker)
// cacheKey = 'version 1';
// cacheAssets = ['index.html','index2.html', 'script2.js']
// function installServiceWorker(e)
// {
//       e.waitUntil(
//             caches.open(cacheKey)
//             .then((cache) => {
//                   cache.addAll(cacheAssets);
//                   console.log('Assets added to the cache');
//             })
//             .then(() => { self.skipWaiting() })
//       )
// }


// self.addEventListener('activate', activateServiceWorker)

// function activateServiceWorker(e)
// {
//       e.waitUntil(
//             caches.keys()
//             .then(cacheKeys => {
//                   return Promise.all(
//                         cacheKeys.map((cache) => {
//                               if(cache != cacheKey)
//                               {
//                                     console.log('Cache cleared.');
//                                     return caches.delete(cache);
//                               }
//                           }
//                         )
//                   )
//             })
//       )
// }

// self.addEventListener('fetch', fetchServiceWorker)

// function fetchServiceWorker(e)
// {
//       e.respondWith(
//             fetch(e.request).catch(() => {
//                   console.log('Website fetched from cache')
//                   return caches.match(e.request)
//             })
//       )
// }