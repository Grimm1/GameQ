<?php
/**
 * This file is part of GameQ.
 *
 * GameQ is free software; you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * GameQ is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace GameQ\Protocols;

/**
 * Medal of honor: Allied Assault Protocol Class
 *
 * @package GameQ\Protocols
 * @author  Bram <https://github.com/Stormyy>
 * @author  Austin Bischoff <austin@codebeard.com>
 */
class Mohaash extends Gamespy
{
    /**
     * String name of this protocol class
     *
     * @type string
     */
    protected $name = 'mohaash';

    /**
     * Longer string name of this protocol class
     *
     * @type string
     */
    protected $name_long = "Medal of Honor: Spearhead ";

    /**
     * Normalize settings for this protocol
     *
     * @type array
     */
    protected $normalize = [
        'general' => [
            // target       => source
            'dedicated'  => 'dedicated',
            'gametype'   => 'gametype',
            'hostname'   => 'hostname',
            'mapname'    => 'mapname',
            'maxplayers' => 'maxplayers',
            'numplayers' => 'numplayers',
            'password'   => 'password',
        ],
        // Individual
        'player'  => [
            'name'  => 'player',
            'score' => 'frags',
            'ping'  => 'ping',
        ],
    ];

    /**
     * Query port is always the client port + 97 in spearhead --> this  is not true !
	* the query port  start at 12300 no matter what the port is. and increments for each server on the box
	* eg.   first server is port 12204  query is 12300
	* second server is 12206  query port is 12301 
     *
     * @param int $clientPort
     *
     * @return int
     */
    public function findQueryPort($clientPort)
    {
        return $clientPort + 97;
    }
}
