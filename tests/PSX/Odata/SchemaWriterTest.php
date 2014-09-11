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

namespace PSX\Odata;

use PSX\Payment\Paypal\Data\Transaction;

/**
 * SchemaWriterTest
 *
 * @author  Christoph Kappestein <k42b3.x@gmail.com>
 * @license http://www.gnu.org/licenses/gpl.html GPLv3
 * @link    http://phpsx.org
 */
class SchemaWriterTest extends \PHPUnit_Framework_TestCase
{
	public function testWriter()
	{
		$record = new Transaction();

		$writer = new SchemaWriter('psx');
		$writer->addEntityType($record);

		$actual   = $writer->toString();
		$expected = <<<XML
<?xml version="1.0"?>
<edmx:Edmx xmlns:edmx="http://schemas.microsoft.com/ado/2007/06/edmx" Version="1.0">
  <edmx:DataServices xmlns:m="http://schemas.microsoft.com/ado/2007/08/dataservices/metadata" m:DataServiceVersion="3.0" m:MaxDataServiceVersion="3.0">
    <Schema xmlns="http://schemas.microsoft.com/ado/2009/11/edm" Namespace="psx">
      <EntityType Name="transaction">
        <Property Name="Amount" Type="psx.amount"/>
        <Property Name="ItemList" Type="psx.item_list"/>
        <ComplexType Name="Amount">
          <Property Name="Details" Type="psx.details"/>
        </ComplexType>
        <ComplexType Name="Item_list">
          <Property Name="Items" Type="Collection(psx.item)"/>
          <Property Name="ShippingAddress" Type="psx.shipping_address"/>
        </ComplexType>
        <ComplexType Name="Details"/>
        <ComplexType Name="Item"/>
        <ComplexType Name="Shipping_address"/>
      </EntityType>
    </Schema>
  </edmx:DataServices>
</edmx:Edmx>
XML;

		$this->assertXmlStringEqualsXmlString($expected, $actual);
	}
}
