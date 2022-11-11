<?php

namespace margusk\Warbsorber\Functions;

use margusk\Warbsorber\Call;
use margusk\Warbsorber\Functions\Exceptions\SplException;

/**
 * This function returns an array with the names of the interfaces that the
 * given object_or_class and its parents implement.
 *
 * @param object|string $object_or_class An object (class instance) or a string (class or interface name).
 * @param bool $autoload Whether to call __autoload by default.
 * @return array An array on success, or FALSE when the given class doesn't exist.
 * @throws SplException
 *
 */
function class_implements($object_or_class, bool $autoload = true): array
{
    return Call::invoke('class_implements',SplException::class,false, $object_or_class, $autoload);
}


/**
 * This function returns an array with the name of the parent classes of
 * the given object_or_class.
 *
 * @param object|string $object_or_class An object (class instance) or a string (class name).
 * @param bool $autoload Whether to call __autoload by default.
 * @return array An array on success, or FALSE when the given class doesn't exist.
 * @throws SplException
 *
 */
function class_parents($object_or_class, bool $autoload = true): array
{
    return Call::invoke('class_parents',SplException::class,false, $object_or_class, $autoload);
}


/**
 * This function returns an array with the names of the traits that the
 * given object_or_class uses. This does however not include
 * any traits used by a parent class.
 *
 * @param object|string $object_or_class An object (class instance) or a string (class name).
 * @param bool $autoload Whether to call __autoload by default.
 * @return array An array on success, or FALSE when the given class doesn't exist.
 * @throws SplException
 *
 */
function class_uses($object_or_class, bool $autoload = true): array
{
    return Call::invoke('class_uses',SplException::class,false, $object_or_class, $autoload);
}


/**
 * Register a function with the spl provided __autoload queue. If the queue
 * is not yet activated it will be activated.
 *
 * If your code has an existing __autoload function then
 * this function must be explicitly registered on the __autoload queue. This
 * is because spl_autoload_register will effectively
 * replace the engine cache for the __autoload function
 * by either spl_autoload or
 * spl_autoload_call.
 *
 * If there must be multiple autoload functions, spl_autoload_register
 * allows for this. It effectively creates a queue of autoload functions, and
 * runs through each of them in the order they are defined. By contrast,
 * __autoload may only be defined once.
 *
 * @param callable(string):void $callback The autoload function being registered.
 * If NULL, then the default implementation of
 * spl_autoload will be registered.
 * @param bool $throw This parameter specifies whether
 * spl_autoload_register should throw
 * exceptions when the callback
 * cannot be registered.
 * @param bool $prepend If true, spl_autoload_register will prepend
 * the autoloader on the autoload queue instead of appending it.
 * @throws SplException
 *
 */
function spl_autoload_register(callable $callback = null, bool $throw = true, bool $prepend = false): void
{
    if ($prepend !== false) {
        Call::invoke('spl_autoload_register',SplException::class,false, $callback, $throw, $prepend);
    } elseif ($throw !== true) {
        Call::invoke('spl_autoload_register',SplException::class,false, $callback, $throw);
    } elseif ($callback !== null) {
        Call::invoke('spl_autoload_register',SplException::class,false, $callback);
    } else {
        Call::invoke('spl_autoload_register',SplException::class,false);
    }
}


/**
 * Removes a function from the autoload queue. If the queue
 * is activated and empty after removing the given function then it will
 * be deactivated.
 *
 * When this function results in the queue being deactivated, any
 * __autoload function that previously existed will not be reactivated.
 *
 * @param mixed $callback The autoload function being unregistered.
 * @throws SplException
 *
 */
function spl_autoload_unregister($callback): void
{
    Call::invoke('spl_autoload_unregister',SplException::class,false, $callback);
}
