<?php

namespace margusk\Warbsorber\Functions;

use margusk\Warbsorber\Call;
use margusk\Warbsorber\Functions\Exceptions\RrdException;

/**
 * Creates the rdd database file.
 *
 * @param string $filename Filename for newly created rrd file.
 * @param array $options Options for rrd create - list of strings. See man page of rrd create
 * for whole list of options.
 * @throws RrdException
 *
 */
function rrd_create(string $filename, array $options): void
{
    Call::invoke('rrd_create',RrdException::class,false, $filename, $options);
}


/**
 * Returns the first data sample from the specified RRA of the RRD file.
 *
 * @param string $file RRD database file name.
 * @param int $raaindex The index number of the RRA that is to be examined. Default value is 0.
 * @return int Integer number of unix timestamp.
 * @throws RrdException
 *
 */
function rrd_first(string $file, int $raaindex = 0): int
{
    return Call::invoke('rrd_first',RrdException::class,false, $file, $raaindex);
}


/**
 * Creates image for a particular data from RRD file.
 *
 * @param string $filename The filename to output the graph to. This will generally end in either
 * .png, .svg or
 * .eps, depending on the format you want to output.
 * @param array $options Options for generating image. See man page of rrd graph for all
 * possible options. All options (data definitions, variable definitions, etc.)
 * are allowed.
 * @return array Array with information about generated image is returned.
 * @throws RrdException
 *
 */
function rrd_graph(string $filename, array $options): array
{
    return Call::invoke('rrd_graph',RrdException::class,false, $filename, $options);
}


/**
 * Returns information about particular RRD database file.
 *
 * @param string $filename RRD database file name.
 * @return array Array with information about requested RRD file.
 * @throws RrdException
 *
 */
function rrd_info(string $filename): array
{
    return Call::invoke('rrd_info',RrdException::class,false, $filename);
}


/**
 * Gets array of the UNIX timestamp and the values stored for each date in the
 * most recent update of the RRD database file.
 *
 * @param string $filename RRD database file name.
 * @return array Array of information about last update.
 * @throws RrdException
 *
 */
function rrd_lastupdate(string $filename): array
{
    return Call::invoke('rrd_lastupdate',RrdException::class,false, $filename);
}


/**
 * Restores the RRD file from the XML dump.
 *
 * @param string $xml_file XML filename with the dump of the original RRD database file.
 * @param string $rrd_file Restored RRD database file name.
 * @param array $options Array of options for restoring. See man page for rrd restore.
 * @throws RrdException
 *
 */
function rrd_restore(string $xml_file, string $rrd_file, array $options = null): void
{
    if ($options !== null) {
        Call::invoke('rrd_restore',RrdException::class,false, $xml_file, $rrd_file, $options);
    } else {
        Call::invoke('rrd_restore',RrdException::class,false, $xml_file, $rrd_file);
    }
}


/**
 * Change some options in the RRD dabase header file. E.g. renames the source for
 * the data etc.
 *
 * @param string $filename RRD database file name.
 * @param array $options Options with RRD database file properties which will be changed. See
 * rrd tune man page for details.
 * @throws RrdException
 *
 */
function rrd_tune(string $filename, array $options): void
{
    Call::invoke('rrd_tune',RrdException::class,false, $filename, $options);
}


/**
 * Updates the RRD database file. The input data is time interpolated according to the
 * properties of the RRD database file.
 *
 * @param string $filename RRD database file name. This database will be updated.
 * @param array $options Options for updating the RRD database. This is list of strings. See man page of rrd update
 * for whole list of options.
 * @throws RrdException
 *
 */
function rrd_update(string $filename, array $options): void
{
    Call::invoke('rrd_update',RrdException::class,false, $filename, $options);
}


/**
 * Exports the information about RRD database file. This data can be converted
 * to XML file via user space PHP script and then restored back as RRD database
 * file.
 *
 * @param array $options Array of options for the export, see rrd xport man page.
 * @return array Array with information about RRD database file.
 * @throws RrdException
 *
 */
function rrd_xport(array $options): array
{
    return Call::invoke('rrd_xport',RrdException::class,false, $options);
}
