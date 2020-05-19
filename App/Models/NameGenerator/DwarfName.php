<?php

/*
 * A dwarf's name is granted by clan elder, in accordance with tradition.
 * Every proper dwarven name has been used and reused down through the generations.
 * A dwarf's name belongs to the clan, not to the individual.
 * A dwarf who misuses or brings shame to a clan name is stripped of the name and forbidden
 * by law to use any dwarven name in it's place.
 *
 * Male Names:
 * Adrik, Alberich, Baern, Barendd, Brottor, Bruenor, Dain, Darrak, Delg, Eberk,
 * Einkil, Fargrim, Flint, Gardain, Harbek, Kildrak, Morgran, Orsik, Oskar, Rangrim,
 * Rurik, Taklinn, Thoradin, Thorin, Tordek, Traubon, Travok, Ulfgar, Veit, Vondal
 *
 * Female Names:
 * Amber, Artin, Audhild, Bardryn, Dagnal, Diesa, Eldeth, Falkrunn, Finellen, Gunnloda,
 * Gurdis, Helja, Hlin, Kathra, Kristryd, Ilde, Liftrasa, Mardred, Riswynn, Sannl,
 * Torbera, Torgga, Vistra
 *
 * Clan Names:
 * Balderk, Battlehammer, Brawnanvil, Dankil, Fireforge, Frostbeard, Gorunn, Holderhek,
 * Ironfist, Loderr, Lutgehr, Rumnaheim, Strakeln, Torunn, Ungart
 */


namespace App\Models\NameGenerator;


use App\Models\NameGenerator;


class DwarfName extends NameGenerator
{
	public function __construct()
	{
		parent::__construct();
	}
}