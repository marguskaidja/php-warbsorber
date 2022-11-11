<?php

namespace margusk\Warbsorber\Functions;

use margusk\Warbsorber\Call;
use margusk\Warbsorber\Functions\Exceptions\IbaseException;

/**
 * This function will discard a BLOB if it has not yet been closed by
 * fbird_blob_close.
 *
 * @param resource $blob_handle A BLOB handle opened with fbird_blob_create.
 * @throws IbaseException
 *
 */
function fbird_blob_cancel($blob_handle): void
{
    Call::invoke('fbird_blob_cancel',IbaseException::class,false, $blob_handle);
}


/**
 *
 *
 * @param resource $service_handle The handle on the database server service.
 * @param string $user_name The login name of the new database user.
 * @param string $password The password of the new user.
 * @param string $first_name The first name of the new database user.
 * @param string $middle_name The middle name of the new database user.
 * @param string $last_name The last name of the new database user.
 * @throws IbaseException
 *
 */
function ibase_add_user($service_handle, string $user_name, string $password, string $first_name = null, string $middle_name = null, string $last_name = null): void
{
    if ($last_name !== null) {
        Call::invoke('ibase_add_user',IbaseException::class,false, $service_handle, $user_name, $password, $first_name, $middle_name, $last_name);
    } elseif ($middle_name !== null) {
        Call::invoke('ibase_add_user',IbaseException::class,false, $service_handle, $user_name, $password, $first_name, $middle_name);
    } elseif ($first_name !== null) {
        Call::invoke('ibase_add_user',IbaseException::class,false, $service_handle, $user_name, $password, $first_name);
    } else {
        Call::invoke('ibase_add_user',IbaseException::class,false, $service_handle, $user_name, $password);
    }
}


/**
 * This function passes the arguments to the (remote) database server. There it starts a new backup process. Therefore you
 * won't get any responses.
 *
 * @param resource $service_handle A previously opened connection to the database server.
 * @param string $source_db The absolute file path to the database on the database server. You can also use a database alias.
 * @param string $dest_file The path to the backup file on the database server.
 * @param int $options Additional options to pass to the database server for backup.
 * The options parameter can be a combination
 * of the following constants:
 * IBASE_BKP_IGNORE_CHECKSUMS,
 * IBASE_BKP_IGNORE_LIMBO,
 * IBASE_BKP_METADATA_ONLY,
 * IBASE_BKP_NO_GARBAGE_COLLECT,
 * IBASE_BKP_OLD_DESCRIPTIONS,
 * IBASE_BKP_NON_TRANSPORTABLE or
 * IBASE_BKP_CONVERT.
 * Read the section about  for further information.
 * @param bool $verbose Since the backup process is done on the database server, you don't have any chance
 * to get its output. This argument is useless.
 * @return mixed Returns TRUE on success.
 *
 * Since the backup process is done on the (remote) server, this function just passes the arguments to it.
 * While the arguments are legal, you won't get FALSE.
 * @throws IbaseException
 *
 */
function ibase_backup($service_handle, string $source_db, string $dest_file, int $options = 0, bool $verbose = false)
{
    return Call::invoke('ibase_backup',IbaseException::class,false, $service_handle, $source_db, $dest_file, $options, $verbose);
}


/**
 * This function will discard a BLOB if it has not yet been closed by
 * ibase_blob_close.
 *
 * @param resource $blob_handle A BLOB handle opened with ibase_blob_create.
 * @throws IbaseException
 *
 */
function ibase_blob_cancel($blob_handle): void
{
    Call::invoke('ibase_blob_cancel',IbaseException::class,false, $blob_handle);
}


/**
 * ibase_blob_create creates a new BLOB for filling with
 * data.
 *
 * @param resource $link_identifier An InterBase link identifier. If omitted, the last opened link is
 * assumed.
 * @return resource Returns a BLOB handle for later use with
 * ibase_blob_add.
 * @throws IbaseException
 *
 */
function ibase_blob_create($link_identifier = null)
{
    if ($link_identifier !== null) {
        return Call::invoke('ibase_blob_create',IbaseException::class,false, $link_identifier);
    } else {
        return Call::invoke('ibase_blob_create',IbaseException::class,false);
    }
}


/**
 * This function returns at most len bytes from a BLOB
 * that has been opened for reading by ibase_blob_open.
 *
 * @param resource $blob_handle A BLOB handle opened with ibase_blob_open.
 * @param int $len Size of returned data.
 * @return string Returns at most len bytes from the BLOB.
 * @throws IbaseException
 *
 */
function ibase_blob_get($blob_handle, int $len): string
{
    return Call::invoke('ibase_blob_get',IbaseException::class,false, $blob_handle, $len);
}


/**
 * Closes the link to an InterBase database that's associated with
 * a connection id returned from ibase_connect.
 * Default transaction on link is committed, other transactions are
 * rolled back.
 *
 * @param resource $connection_id An InterBase link identifier returned from
 * ibase_connect. If omitted, the last opened link
 * is assumed.
 * @throws IbaseException
 *
 */
function ibase_close($connection_id = null): void
{
    if ($connection_id !== null) {
        Call::invoke('ibase_close',IbaseException::class,false, $connection_id);
    } else {
        Call::invoke('ibase_close',IbaseException::class,false);
    }
}


/**
 * Commits a transaction without closing it.
 *
 * @param resource $link_or_trans_identifier If called without an argument, this function commits the default
 * transaction of the default link. If the argument is a connection
 * identifier, the default transaction of the corresponding connection
 * will be committed. If the argument is a transaction identifier, the
 * corresponding transaction will be committed. The transaction context
 * will be retained, so statements executed from within this transaction
 * will not be invalidated.
 * @throws IbaseException
 *
 */
function ibase_commit_ret($link_or_trans_identifier = null): void
{
    if ($link_or_trans_identifier !== null) {
        Call::invoke('ibase_commit_ret',IbaseException::class,false, $link_or_trans_identifier);
    } else {
        Call::invoke('ibase_commit_ret',IbaseException::class,false);
    }
}


/**
 * Commits a transaction.
 *
 * @param resource $link_or_trans_identifier If called without an argument, this function commits the default
 * transaction of the default link. If the argument is a connection
 * identifier, the default transaction of the corresponding connection
 * will be committed. If the argument is a transaction identifier, the
 * corresponding transaction will be committed.
 * @throws IbaseException
 *
 */
function ibase_commit($link_or_trans_identifier = null): void
{
    if ($link_or_trans_identifier !== null) {
        Call::invoke('ibase_commit',IbaseException::class,false, $link_or_trans_identifier);
    } else {
        Call::invoke('ibase_commit',IbaseException::class,false);
    }
}


/**
 * Establishes a connection to an Firebird/InterBase server.
 *
 * In case a second call is made to ibase_connect with
 * the same arguments, no new link will be established, but instead, the link
 * identifier of the already opened link will be returned. The link to the
 * server will be closed as soon as the execution of the script ends, unless
 * it's closed earlier by explicitly calling ibase_close.
 *
 * @param string $database The database argument has to be a valid path to
 * database file on the server it resides on. If the server is not local,
 * it must be prefixed with either 'hostname:' (TCP/IP), 'hostname/port:'
 * (TCP/IP with interbase server on custom TCP port), '//hostname/'
 * (NetBEUI), depending on the connection
 * protocol used.
 * @param string $username The user name. Can be set with the
 * ibase.default_user php.ini directive.
 * @param string $password The password for username. Can be set with the
 * ibase.default_password php.ini directive.
 * @param string $charset charset is the default character set for a
 * database.
 * @param int $buffers buffers is the number of database buffers to
 * allocate for the server-side cache. If 0 or omitted, server chooses
 * its own default.
 * @param int $dialect dialect selects the default SQL dialect for any
 * statement executed within a connection, and it defaults to the highest
 * one supported by client libraries.
 * @param string $role Functional only with InterBase 5 and up.
 * @param int $sync
 * @return resource Returns an Firebird/InterBase link identifier on success.
 * @throws IbaseException
 *
 */
function ibase_connect(string $database = null, string $username = null, string $password = null, string $charset = null, int $buffers = null, int $dialect = null, string $role = null, int $sync = null)
{
    if ($sync !== null) {
        return Call::invoke('ibase_connect',IbaseException::class,false, $database, $username, $password, $charset, $buffers, $dialect, $role, $sync);
    } elseif ($role !== null) {
        return Call::invoke('ibase_connect',IbaseException::class,false, $database, $username, $password, $charset, $buffers, $dialect, $role);
    } elseif ($dialect !== null) {
        return Call::invoke('ibase_connect',IbaseException::class,false, $database, $username, $password, $charset, $buffers, $dialect);
    } elseif ($buffers !== null) {
        return Call::invoke('ibase_connect',IbaseException::class,false, $database, $username, $password, $charset, $buffers);
    } elseif ($charset !== null) {
        return Call::invoke('ibase_connect',IbaseException::class,false, $database, $username, $password, $charset);
    } elseif ($password !== null) {
        return Call::invoke('ibase_connect',IbaseException::class,false, $database, $username, $password);
    } elseif ($username !== null) {
        return Call::invoke('ibase_connect',IbaseException::class,false, $database, $username);
    } elseif ($database !== null) {
        return Call::invoke('ibase_connect',IbaseException::class,false, $database);
    } else {
        return Call::invoke('ibase_connect',IbaseException::class,false);
    }
}


/**
 *
 *
 * @param resource $service_handle The handle on the database server service.
 * @param string $user_name The login name of the user you want to delete from the database.
 * @throws IbaseException
 *
 */
function ibase_delete_user($service_handle, string $user_name): void
{
    Call::invoke('ibase_delete_user',IbaseException::class,false, $service_handle, $user_name);
}


/**
 * This functions drops a database that was opened by either ibase_connect
 * or ibase_pconnect. The database is closed and deleted from the server.
 *
 * @param resource $connection An InterBase link identifier. If omitted, the last opened link is
 * assumed.
 * @throws IbaseException
 *
 */
function ibase_drop_db($connection = null): void
{
    if ($connection !== null) {
        Call::invoke('ibase_drop_db',IbaseException::class,false, $connection);
    } else {
        Call::invoke('ibase_drop_db',IbaseException::class,false);
    }
}


/**
 * This function causes the registered event handler specified by
 * event to be cancelled. The callback function will
 * no longer be called for the events it was registered to handle.
 *
 * @param resource $event An event resource, created by
 * ibase_set_event_handler.
 * @throws IbaseException
 *
 */
function ibase_free_event_handler($event): void
{
    Call::invoke('ibase_free_event_handler',IbaseException::class,false, $event);
}


/**
 * Frees a prepared query.
 *
 * @param resource $query A query prepared with ibase_prepare.
 * @throws IbaseException
 *
 */
function ibase_free_query($query): void
{
    Call::invoke('ibase_free_query',IbaseException::class,false, $query);
}


/**
 * Frees a result set.
 *
 * @param resource $result_identifier A result set created by ibase_query or
 * ibase_execute.
 * @throws IbaseException
 *
 */
function ibase_free_result($result_identifier): void
{
    Call::invoke('ibase_free_result',IbaseException::class,false, $result_identifier);
}


/**
 *
 *
 * @param resource $service_handle
 * @param string $db
 * @param int $action
 * @param int $argument
 * @throws IbaseException
 *
 */
function ibase_maintain_db($service_handle, string $db, int $action, int $argument = 0): void
{
    Call::invoke('ibase_maintain_db',IbaseException::class,false, $service_handle, $db, $action, $argument);
}


/**
 *
 *
 * @param resource $service_handle The handle on the database server service.
 * @param string $user_name The login name of the database user to modify.
 * @param string $password The user's new password.
 * @param string $first_name The user's new first name.
 * @param string $middle_name The user's new middle name.
 * @param string $last_name The user's new last name.
 * @throws IbaseException
 *
 */
function ibase_modify_user($service_handle, string $user_name, string $password, string $first_name = null, string $middle_name = null, string $last_name = null): void
{
    if ($last_name !== null) {
        Call::invoke('ibase_modify_user',IbaseException::class,false, $service_handle, $user_name, $password, $first_name, $middle_name, $last_name);
    } elseif ($middle_name !== null) {
        Call::invoke('ibase_modify_user',IbaseException::class,false, $service_handle, $user_name, $password, $first_name, $middle_name);
    } elseif ($first_name !== null) {
        Call::invoke('ibase_modify_user',IbaseException::class,false, $service_handle, $user_name, $password, $first_name);
    } else {
        Call::invoke('ibase_modify_user',IbaseException::class,false, $service_handle, $user_name, $password);
    }
}


/**
 * This function assigns a name to a result set. This name can be used later in
 * UPDATE|DELETE ... WHERE CURRENT OF name statements.
 *
 * @param resource $result An InterBase result set.
 * @param string $name The name to be assigned.
 * @throws IbaseException
 *
 */
function ibase_name_result($result, string $name): void
{
    Call::invoke('ibase_name_result',IbaseException::class,false, $result, $name);
}


/**
 * Opens a persistent connection to an InterBase database.
 *
 * ibase_pconnect acts very much like
 * ibase_connect with two major differences.
 *
 * First, when connecting, the function will first try to find a (persistent)
 * link that's already opened with the same parameters. If one is found, an
 * identifier for it will be returned instead of opening a new connection.
 *
 * Second, the connection to the InterBase server will not be closed when the
 * execution of the script ends. Instead, the link will remain open for
 * future use (ibase_close will not close links
 * established by ibase_pconnect). This type of link is
 * therefore called 'persistent'.
 *
 * @param string $database The database argument has to be a valid path to
 * database file on the server it resides on. If the server is not local,
 * it must be prefixed with either 'hostname:' (TCP/IP), '//hostname/'
 * (NetBEUI) or 'hostname@' (IPX/SPX), depending on the connection
 * protocol used.
 * @param string $username The user name. Can be set with the
 * ibase.default_user php.ini directive.
 * @param string $password The password for username. Can be set with the
 * ibase.default_password php.ini directive.
 * @param string $charset charset is the default character set for a
 * database.
 * @param int $buffers buffers is the number of database buffers to
 * allocate for the server-side cache. If 0 or omitted, server chooses
 * its own default.
 * @param int $dialect dialect selects the default SQL dialect for any
 * statement executed within a connection, and it defaults to the highest
 * one supported by client libraries. Functional only with InterBase 6
 * and up.
 * @param string $role Functional only with InterBase 5 and up.
 * @param int $sync
 * @return resource Returns an InterBase link identifier on success.
 * @throws IbaseException
 *
 */
function ibase_pconnect(string $database = null, string $username = null, string $password = null, string $charset = null, int $buffers = null, int $dialect = null, string $role = null, int $sync = null)
{
    if ($sync !== null) {
        return Call::invoke('ibase_pconnect',IbaseException::class,false, $database, $username, $password, $charset, $buffers, $dialect, $role, $sync);
    } elseif ($role !== null) {
        return Call::invoke('ibase_pconnect',IbaseException::class,false, $database, $username, $password, $charset, $buffers, $dialect, $role);
    } elseif ($dialect !== null) {
        return Call::invoke('ibase_pconnect',IbaseException::class,false, $database, $username, $password, $charset, $buffers, $dialect);
    } elseif ($buffers !== null) {
        return Call::invoke('ibase_pconnect',IbaseException::class,false, $database, $username, $password, $charset, $buffers);
    } elseif ($charset !== null) {
        return Call::invoke('ibase_pconnect',IbaseException::class,false, $database, $username, $password, $charset);
    } elseif ($password !== null) {
        return Call::invoke('ibase_pconnect',IbaseException::class,false, $database, $username, $password);
    } elseif ($username !== null) {
        return Call::invoke('ibase_pconnect',IbaseException::class,false, $database, $username);
    } elseif ($database !== null) {
        return Call::invoke('ibase_pconnect',IbaseException::class,false, $database);
    } else {
        return Call::invoke('ibase_pconnect',IbaseException::class,false);
    }
}


/**
 * This function passes the arguments to the (remote) database server. There it starts a new restore process. Therefore you
 * won't get any responses.
 *
 * @param resource $service_handle A previously opened connection to the database server.
 * @param string $source_file The absolute path on the server where the backup file is located.
 * @param string $dest_db The path to create the new database on the server. You can also use database alias.
 * @param int $options Additional options to pass to the database server for restore.
 * The options parameter can be a combination
 * of the following constants:
 * IBASE_RES_DEACTIVATE_IDX,
 * IBASE_RES_NO_SHADOW,
 * IBASE_RES_NO_VALIDITY,
 * IBASE_RES_ONE_AT_A_TIME,
 * IBASE_RES_REPLACE,
 * IBASE_RES_CREATE,
 * IBASE_RES_USE_ALL_SPACE,
 * IBASE_PRP_PAGE_BUFFERS,
 * IBASE_PRP_SWEEP_INTERVAL,
 * IBASE_RES_CREATE.
 * Read the section about  for further information.
 * @param bool $verbose Since the restore process is done on the database server, you don't have any chance
 * to get its output. This argument is useless.
 * @return mixed Returns TRUE on success.
 *
 * Since the restore process is done on the (remote) server, this function just passes the arguments to it.
 * While the arguments are legal, you won't get FALSE.
 * @throws IbaseException
 *
 */
function ibase_restore($service_handle, string $source_file, string $dest_db, int $options = 0, bool $verbose = false)
{
    return Call::invoke('ibase_restore',IbaseException::class,false, $service_handle, $source_file, $dest_db, $options, $verbose);
}


/**
 * Rolls back a transaction without closing it.
 *
 * @param resource $link_or_trans_identifier If called without an argument, this function rolls back the default
 * transaction of the default link. If the argument is a connection
 * identifier, the default transaction of the corresponding connection
 * will be rolled back. If the argument is a transaction identifier, the
 * corresponding transaction will be rolled back. The transaction context
 * will be retained, so statements executed from within this transaction
 * will not be invalidated.
 * @throws IbaseException
 *
 */
function ibase_rollback_ret($link_or_trans_identifier = null): void
{
    if ($link_or_trans_identifier !== null) {
        Call::invoke('ibase_rollback_ret',IbaseException::class,false, $link_or_trans_identifier);
    } else {
        Call::invoke('ibase_rollback_ret',IbaseException::class,false);
    }
}


/**
 * Rolls back a transaction.
 *
 * @param resource $link_or_trans_identifier If called without an argument, this function rolls back the default
 * transaction of the default link. If the argument is a connection
 * identifier, the default transaction of the corresponding connection
 * will be rolled back. If the argument is a transaction identifier, the
 * corresponding transaction will be rolled back.
 * @throws IbaseException
 *
 */
function ibase_rollback($link_or_trans_identifier = null): void
{
    if ($link_or_trans_identifier !== null) {
        Call::invoke('ibase_rollback',IbaseException::class,false, $link_or_trans_identifier);
    } else {
        Call::invoke('ibase_rollback',IbaseException::class,false);
    }
}


/**
 *
 *
 * @param string $host The name or ip address of the database host. You can define the port by adding
 * '/' and port number. If no port is specified, port 3050 will be used.
 * @param string $dba_username The name of any valid user.
 * @param string $dba_password The user's password.
 * @return resource Returns a Interbase / Firebird link identifier on success.
 * @throws IbaseException
 *
 */
function ibase_service_attach(string $host, string $dba_username, string $dba_password)
{
    return Call::invoke('ibase_service_attach',IbaseException::class,false, $host, $dba_username, $dba_password);
}


/**
 *
 *
 * @param resource $service_handle A previously created connection to the database server.
 * @throws IbaseException
 *
 */
function ibase_service_detach($service_handle): void
{
    Call::invoke('ibase_service_detach',IbaseException::class,false, $service_handle);
}
