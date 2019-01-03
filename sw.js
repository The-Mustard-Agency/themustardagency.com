var cacheName = 'cache';

var requiredCacheFiles = [
  'https://staging.mustardwebsites.co.uk/themustardagency.com/wp-content/themes/mustard/images/logo.png',
  'https://staging.mustardwebsites.co.uk/themustardagency.com/index.js',
  'https://staging.mustardwebsites.co.uk/themustardagency.com/sw.js',
  'https://staging.mustardwebsites.co.uk/themustardagency.com/wp-content/themes/mustard/offline/offline.html'
];


self.addEventListener('fetch', function(e){
});

self.addEventListener('install', function(event){
  console.log("[serviceWorker] installed.");
  event.waitUntil(
    caches.open(cacheName).then(function(cache){
      return cache.addAll(requiredCacheFiles);
    })
  );
});

self.addEventListener('activate', function(event){
  console.log("[serviceWorker] activated.");
  event.waitUntil(
    caches.keys().then(function(keyList){
      return Promise.all(keyList.map(function(key){
        if (key !== cacheName) {
          console.log('[ServiceWorker] Removing old cache', key);
          return caches.delete(key);
        }
      }));
    })
  );
  return self.clients.claim();
});

self.addEventListener('fetch', function(event) {
  if (event.request.mode === 'navigate' || (event.request.method === 'GET' && event.request.headers.get('accept').includes('text/html'))) {
    event.respondWith(
      fetch(event.request).catch(function(error) {
        console.log('Fetch failed; returning offline page instead.', error);
        return caches.match('https://staging.mustardwebsites.co.uk/themustardagency.com/wp-content/themes/mustard/offline/offline.html');
      })
    );
  }
});
