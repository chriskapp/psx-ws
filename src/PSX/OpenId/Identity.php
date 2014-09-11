<?php
/*
 * psx
 * A object oriented and modular based PHP framework for developing
 * dynamic web applications. For the current version and informations
 * visit <http://phpsx.org>
 *
 * Copyright (c) 2010-2014 Christoph Kappestein <k42b3.x@gmail.com>
 *
 * This file is part of psx. psx is free software: you can
 * redistribute it and/or modify it under the terms of the
 * GNU General Public License as published by the Free Software
 * Foundation, either version 3 of the License, or any later version.
 *
 * psx is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with psx. If not, see <http://www.gnu.org/licenses/>.
 */

namespace PSX\OpenId;

use PSX\Url;

/**
 * Identity
 *
 * @author  Christoph Kappestein <k42b3.x@gmail.com>
 * @license http://www.gnu.org/licenses/gpl.html GPLv3
 * @link    http://phpsx.org
 */
class Identity
{
	protected $server;
	protected $localId;

	public function __construct($server, $localId = null)
	{
		$this->setServer(new Url($server));

		if(!empty($localId))
		{
			$this->setLocalId(new Url($localId));
		}
	}

	public function setServer(Url $server)
	{
		$this->server = $server;
	}

	public function setLocalId(Url $localId)
	{
		$this->localId = $localId;
	}

	public function getServer()
	{
		return $this->server;
	}

	public function getLocalId()
	{
		return $this->localId;
	}
}
