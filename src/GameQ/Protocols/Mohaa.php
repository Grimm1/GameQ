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
class Mohaa extends Gamespy
{
    /**
     * String name of this protocol class
     *
     * @type string
     */
    protected $name = 'mohaa';

    /**
     * Longer string name of this protocol class
     *
     * @type string
     */
    protected $name_long = "Medal of honor: Allied Assault";

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
     * Query port starts at 12300 for the first server on the box regardless of its game port 12203 -> 12300
     * if the only server on the box is on a different port e.g. 12204 the query port is still 12300
     * a second server on port 12205 would have a port of 12301, in this case use port option in server setup!
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
