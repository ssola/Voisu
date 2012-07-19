<?php
/**
 * The globalstaticcache functions provide a clean and simple mechanism for implementing
 * global static caching, eliminating much boilerplate code. The advantage of using
 * globalstaticcache instead of local static variables is that any objects you cache
 * are available globally, not just inside one function.
 * 
 * @author Neil O'Toole
 */

/**
 * The global cache of caches.
 */
$globalstaticcache_data = array();


/**
 * Get an object from the named static cache, or the entire
 * cache if $key is null. Note that this item will return NULL
 * if the $key is not cached OR if $key's cached value is NULL.
 * Use #staticcache_isset to distinguish between these cases.
 *
 * @param $cache_name
 *  The name of the cache
 * @param $key
 *  The key of the object to retrieve, may be NULL.
 * @return an object, or NULL
 */
function staticcache_get($cache_name, $key = NULL) {
	
	// The global array of static caches
	global $globalstaticcache_data;
	
	// Check if the global cache exists
	if ($globalstaticcache_data) {
		
		// The global cache exists; check if the named cache exists
		$cache = $globalstaticcache_data[$cache_name];
		
		if ($cache && $key) {
			// If the named cache exists, and $key is set, return the cached value
			return $cache[$key];
		}
		
		// Else return the entire cache (which could be NULL)
		return $cache;
	}
}


/**
 * Return true if the cache item has been set (even if
 * the value is NULL). If
 * $key is null, this method returns true if the
 * named cache exists.
 *
 * @param $cache_name
 *  The name of the cache
 * @param $key
 *  The key of the object to test, or NULL to test if the cache exists
 * 
 * @return true if the cache or key is set (even if NULL), false otherwise
 */
function staticcache_isset($cache_name, $key = NULL) {
	
	// The global array of static caches
	global $globalstaticcache_data;
	
	if ($key) {
		// Check if the keyed element exists
		return isset($globalstaticcache_data[$cache_name][$key]);
	}
	
	// Else, check if the named cache exists
	return isset($globalstaticcache_data[$cache_name]);
	
	
}


/**
 * Put an object into the named static cache.
 *
 * @param $cache_name
 *  The name of the cache
 * @param $key
 *  The key of the object to cache
 * @param $data
 *   The object to cache
 */
function staticcache_set($cache_name, $key, $data) {
	
	// The global array of static caches
	global $globalstaticcache_data;
	
	if (!isset($globalstaticcache_data)) {
		// If $globalstaticcache_data is not set, create it.
		$globalstaticcache_data = array();
	}
	
	if (!isset($globalstaticcache_data[$cache_name])) {
		// If the named cache does not exist, create it.
		$globalstaticcache_data[$cache_name] = array();
	}
	
	// Store $data under $key in the named cache $cache_name
	$globalstaticcache_data[$cache_name][$key] = $data;
}


/**
 * Clear the key/value pair from the named cache. If $key is NULL,
 * the entire named cache will be cleared.
 *
 * @param $cache_name
 *  The name of the cache
 * @param $key
 *  The key of the object to cache; if NULL, will clear the entire named cache.
 */
function staticcache_clear($cache_name, $key = NULL) {
	
	// The global array of static caches
	global $globalstaticcache_data;
	
	if ($key) {
		// Clear the keyed object
		unset($globalstaticcache_data[$cache_name][$key]);
	}
	else {
		// Clear the entire named cache
		unset($globalstaticcache_data[$cache_name]);
	}
}
?>