<?php

/*
 * Elves are considered children until they declare themselves adults,
 * some time after the hundredth birthday, and before this period they
 * are called by child names.
 * On declaring adulthood, an elf selects an adult name, although those
 * who knew him or her as a youngster might continue to use the child
 * name. Each elf's adult name is a unique creation, though it might
 * reflect the names of respected individuals or other family members.
 * Little distinction exists between male names and female names; the
 * groupings here reflect only general tendencies. In addition, every
 * elf bears a family name, typically a combination of other Elvish
 * words. Some elves traveling among humans translate their family
 * names into Common, but others retain the Elvish version
 *
 * Child Names:
 * Ara, Bryn, Del, Eryn, Faen, Innil, Lael, Mella, Naill, Naeris, Phann,
 * Rael, Rinn, Sai, Syllin, Thia, Vall
 *
 * Male Adult Names:
 * Adran, Aelar, Aramil, Arannis, Aust, Beiro, Berrian, Carric, Enialis,
 * Erdan, Erevan, Galinndan, Hadarai, Heian, Himo, Immeral, Ivellios,
 * Laucian, Mindartis, Paelias, Peren, Quarion, Riardon, Rolen, Soveliss,
 * Thamior, Tharivol, Theren, Varis
 *
 * Female Adult Names:
 * Adrie, Althaea, Anastrianna, Andraste, Antinua, Behrynna, Birel, Caelynn,
 * Drusilia, Enna, Felosial, Ielenia, Jelenneth, Keyleth, Leshanna, Lia,
 * Meriele, Mialee, Naivara, Quelenna, Quillathe, Sariel, Shanairra, Shava,
 * Silaqui, Theirastra, Thia, Vadania, Valanthe, Xanaphia
 *
 * Family Names (Common Translations):
 * Amikiir (Gemflower), Amastacia (Starflower), Galanodel (Moonwhisper),
 * Holimion (Diamonddew), Ilphelkiir (Gemblossom), Liadon (Silverfrond),
 * Meliamne (Oakenheel), Nailo (Nightbreeze), Siannodel (Moonbrook),
 * Xiloscient (Goldpetal)
 */

namespace App\Models\NameGenerator;


class ElfName extends \App\Models\NameGenerator
{
	public function __construct()
	{
		parent::__construct();
	}
}