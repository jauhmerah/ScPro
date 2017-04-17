<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class My_flag
	{		
		public function __construct()
		{
	        $this->obj =& get_instance();
		}
		public function flag_code($country = null)
		{
			switch ($country) {
				case ("Algeria") :   $code = "dz"; break;
				case ("Angola") :   $code = "ao"; break;
				case ("Benin") :   $code = "bj"; break;
				case ("Botswana") :   $code = "bw"; break;
				case ("Burkina Faso") :   $code = "bf"; break;
				case ("Cameroon") :   $code = "cm"; break;
				case ("Cape Verde") :   $code = "cv"; break;
				case ("African") :
				case ("African Republic") :
				case ("Central African Republic") :   $code = "cf"; break;
				case ("Chad") :   $code = "td"; break;
				case ("Comoros") :   $code = "km"; break;
				case ("Congo") :   $code = "cg"; break;
				case ("Congo, The Democratic Republic of the") :   $code = "cd"; break;
				case ("d'Ivoire") :
				case ("Cote") :
				case ("Cote d'Ivoire") :   $code = "ci"; break;
				case ("Djibouti") :   $code = "dj"; break;
				case ("Egypt") :   $code = "eg"; break;
				case ("Guinea") :
				case ("Equatorial") :
				case ("Equatorial Guinea") :   $code = "gq"; break;
				case ("Eritrea") :   $code = "er"; break;
				case ("Ethiopia") :   $code = "et"; break;
				case ("Gabon") :   $code = "ga"; break;
				case ("Gambia") :   $code = "gm"; break;
				case ("Ghana") :   $code = "gh"; break;
				case ("Guinea") :   $code = "gn"; break;
				case ("Guinea") :
				case ("Bissau") :
				case ("Guinea-Bissau") :   $code = "gw"; break;
				case ("Kenya") :   $code = "ke"; break;
				case ("Lesotho") :   $code = "ls"; break;
				case ("Liberia") :   $code = "lr"; break;
				case ("Libya") :   $code = "ly"; break;
				case ("Madagascar") :   $code = "mg"; break;
				case ("Malawi") :   $code = "mw"; break;
				case ("Mali") :   $code = "ml"; break;
				case ("Mauritania") :   $code = "mr"; break;
				case ("Mauritius") :   $code = "mu"; break;
				case ("Morocco") :   $code = "ma"; break;
				case ("Mozambique") :   $code = "mz"; break;
				case ("Namibia") :   $code = "na"; break;
				case ("Niger") :   $code = "ne"; break;
				case ("Nigeria") :   $code = "ng"; break;
				case ("Reunion") :   $code = "re"; break;
				case ("Rwanda") :   $code = "rw"; break;
				case ("Sao Tome and Principe") :   $code = "st"; break;
				case ("Senegal") :   $code = "sn"; break;
				case ("Seychelles") :   $code = "sc"; break;
				case ("Sierra Leone") :   $code = "sl"; break;
				case ("Somalia") :   $code = "so"; break;
				case ("South Africa") :   $code = "za"; break;
				case ("Sudan") :   $code = "sd"; break;
				case ("Swaziland") :   $code = "sz"; break;
				case ("Tanzania") :   $code = "tz"; break;
				case ("Togo") :   $code = "tg"; break;
				case ("Tunisia") :   $code = "tn"; break;
				case ("Uganda") :   $code = "ug"; break;
				case ("Sahara") :
				case ("Western Sahara") :   $code = "eh"; break;
				case ("Zambia") :   $code = "zm"; break;
				case ("Zimbabwe") :   $code = "zw"; break;
				case ("Anguilla") :   $code = "ai"; break;
				case ("Barbuda") :
				case ("Antigua") :
				case ("Antigua and Barbuda") :   $code = "ag"; break;
				case ("Argentina") :   $code = "ar"; break;
				case ("Aruba") :   $code = "aw"; break;
				case ("Bahamas") :   $code = "bs"; break;
				case ("Barbados") :   $code = "bb"; break;
				case ("Belize") :   $code = "bz"; break;
				case ("Bermuda") :   $code = "bm"; break;
				case ("Bolivia") :
				case ("Bolivia, Plurinational State Of") :   $code = "bo"; break;
				case ("Brazil") :   $code = "br"; break;
				case ("Canada") :   $code = "ca"; break;
				case ("Cayman") :
				case ("Cayman Islands") :   $code = "ky"; break;
				case ("Chile") :   $code = "cl"; break;
				case ("Colombia") :   $code = "co"; break;
				case ("Costa Rica") :   $code = "cr"; break;
				case ("Cuba") :   $code = "cu"; break;
				case ("Dominica") :   $code = "dm"; break;
				case ("Dominican") :
				case ("Dominican Republic") :   $code = "do"; break;
				case ("Ecuador") :   $code = "ec"; break;
				case ("El Salvador") :   $code = "sv"; break;
				case ("Greenland") :   $code = "gl"; break;
				case ("Grenada") :   $code = "gd"; break;
				case ("Guadeloupe") :   $code = "gp"; break;
				case ("Guatemala") :   $code = "gt"; break;
				case ("Guyana") :   $code = "gy"; break;
				case ("Haiti") :   $code = "ht"; break;
				case ("Honduras") :   $code = "hn"; break;
				case ("Jamaica") :   $code = "jm"; break;
				case ("Martinique") :   $code = "mq"; break;
				case ("Mexico") :   $code = "mx"; break;
				case ("Montserrat") :   $code = "ms"; break;
				case ("Antilles") :
				case ("Netherlands") :
				case ("Netherlands Antilles") :   $code = "an"; break;
				case ("Nicaragua") :   $code = "ni"; break;
				case ("Panama") :   $code = "pa"; break;
				case ("Paraguay") :   $code = "py"; break;
				case ("Peru") :   $code = "pe"; break;
				case ("Puerto") :
				case ("Rico") :
				case ("Puerto Rico") :   $code = "pr"; break;
				case ("Nevis") :
				case ("Saint Kitts") :
				case ("Saint Kitts and Nevis") :   $code = "kn"; break;
				case ("Lucia") : 
				case ("Saint Lucia") :   $code = "lc"; break;
				case ("Vincent") :
				case ("Grenadines") :
				case ("Saint Vincent Grenadines") :
				case ("Saint Vincent and the Grenadines") :   $code = "vc"; break;
				case ("Suriname") :   $code = "sr"; break;
				case ("Trinidad") :
				case ("Tobago") :
				case ("Trinidad Tobago") :
				case ("Trinidad and Tobago") :   $code = "tt"; break;
				case ("Turks") :
				case ("Turks Caicos Islands") :
				case ("Turks Caicos") :
				case ("Caicos") :
				case ("Turks and Caicos Islands") :   $code = "tc"; break;
				case ("US") :
				case ("United States") :   $code = "us"; break;
				case ("Uruguay") :   $code = "uy"; break;
				case ("Venezuela") :
				case ("Venezuela, Bolivarian Republic Of") :   $code = "ve"; break;
				case ("Virgin British") :
				case ("Virgin Islands British") :
				case ("Virgin Islands, UK") :
				case ("Virgin UK") :
				case ("Virgin Islands, British") :   $code = "vg"; break;
				case ("Virgin Islands, US") :
				case ("Virgin Islands US") :
				case ("Virgin US") :
				case ("Virgin Islands, U.S.") :   $code = "vi"; break;
				case ("Afghanistan") :   $code = "af"; break;
				case ("Armenia") :   $code = "am"; break;
				case ("Azerbaijan") :   $code = "az"; break;
				case ("Bahrain") :   $code = "bh"; break;
				case ("Bangladesh") :   $code = "bd"; break;
				case ("Bhutan") :   $code = "bt"; break;
				case ("Brunei") : 
				case ("Brunei Darussalam") :   $code = "bn"; break;
				case ("Cambodia") :   $code = "kh"; break;
				case ("China") :   $code = "cn"; break;
				case ("Cyprus") :   $code = "cy"; break;
				case ("Georgia") :   $code = "ge"; break;
				case ("Hong Kong") :   $code = "hk"; break;
				case ("India") :   $code = "in"; break;
				case ("Indonesia") :   $code = "id"; break;
				case ("Iran") :
				case ("Iran, Islamic Republic of") :   $code = "ir"; break;
				case ("Iraq") :   $code = "iq"; break;
				case ("Israel") :   $code = "il"; break;
				case ("Japan") :   $code = "jp"; break;
				case ("Jordan") :   $code = "jo"; break;
				case ("Kazakhstan") :   $code = "kz"; break;
				case ("North Korea") :
				case ("Korea, Democratic People's Republic of") :   $code = "kp"; break;				
				case ("South Korea") :
				case ("Korea, Republic of") :   $code = "kr"; break;
				case ("Kuwait") :   $code = "kw"; break;
				case ("Kyrgyzstan") :   $code = "kg"; break;
				case ("Lao") :
				case ("Lao People's Democratic Republic") :   $code = "la"; break;
				case ("Lebanon") :   $code = "lb"; break;
				case ("Macao") :   $code = "mo"; break;
				case ("Malaysia") :   $code = "my"; break;
				case ("Maldives") :   $code = "mv"; break;
				case ("Mongolia") :   $code = "mn"; break;
				case ("Myanmar") :   $code = "mm"; break;
				case ("Nepal") :   $code = "np"; break;
				case ("Oman") :   $code = "om"; break;
				case ("Pakistan") :   $code = "pk"; break;
				case ("Palestinian") :
				case ("Palestin") :
				case ("Palestinian Territory, Occupied") :   $code = "ps"; break;
				case ("Philippines") :   $code = "ph"; break;
				case ("Qatar") :   $code = "qa"; break;
				case ("Saudi Arabia") :   $code = "sa"; break;
				case ("Singapore") :   $code = "sg"; break;
				case ("Sri Lanka") :   $code = "lk"; break;
				case ("Syrian") :
				case ("Syria") :
				case ("Syrian Arab Republic") :   $code = "sy"; break;
				case ("Taiwan") :
				case ("Taiwan, Province of China") :   $code = "tw"; break;
				case ("Tajikistan") :   $code = "tj"; break;
				case ("Thailand") :   $code = "th"; break;
				case ("Timor Leste") : 
				case ("Timor-Leste") :   $code = "tl"; break;
				case ("Turkey") :   $code = "tr"; break;
				case ("Turkmenistan") :   $code = "tm"; break;
				case ("UAE") : 
				case ("United Arab Emirates") :   $code = "ae"; break;
				case ("Uzbekistan") :   $code = "uz"; break;
				case ("VietNam") :
				case ("Viet Nam") :   $code = "vn"; break;
				case ("Yemen") :   $code = "ye"; break;
				case ("Albania") :   $code = "al"; break;
				case ("Andorra") :   $code = "ad"; break;
				case ("Austria") :   $code = "at"; break;
				case ("Belarus") :   $code = "by"; break;
				case ("Belgium") :   $code = "be"; break;
				case ("Bosnia") :
				case ("Herzegovina") :
				case ("Bosnia Herzegovina") :
				case ("Bosnia and Herzegovina") :   $code = "ba"; break;
				case ("Bulgaria") :   $code = "bg"; break;
				case ("Croatia") :   $code = "hr"; break;
				case ("Czech") :
				case ("Czech Republic") :   $code = "cz"; break;
				case ("Denmark") :   $code = "dk"; break;
				case ("Estonia") :   $code = "ee"; break;
				case ("Faroe") : 
				case ("Faroe Islands") :   $code = "fo"; break;
				case ("Finland") :   $code = "fi"; break;
				case ("France") :   $code = "fr"; break;
				case ("Germany") :   $code = "de"; break;
				case ("Gibraltar") :   $code = "gi"; break;
				case ("Greece") :   $code = "gr"; break;
				case ("Holy See") :
				case ("Vatican City State") :
				case ("HolySee") :
				case ("Holy See (Vatican City State)") :   $code = "va"; break;
				case ("Hungary") :   $code = "hu"; break;
				case ("Iceland") :   $code = "is"; break;
				case ("Ireland") :   $code = "ie"; break;
				case ("Italy") :   $code = "it"; break;
				case ("Latvia") :   $code = "lv"; break;
				case ("Liechtenstein") :   $code = "li"; break;
				case ("Lithuania") :   $code = "lt"; break;
				case ("Luxembourg") :   $code = "lu"; break;
				case ("Macedonia") :
				case ("Macedonia, The Former Yugoslav Republic of") :   $code = "mk"; break;
				case ("Malta") :   $code = "mt"; break;
				case ("Moldova") :
				case ("Moldova, Republic of") :   $code = "md"; break;
				case ("Monaco") :   $code = "mc"; break;
				case ("Montenegro") :   $code = "me"; break;
				case ("Netherlands") :   $code = "nl"; break;
				case ("Norway") :   $code = "no"; break;
				case ("Poland") :   $code = "pl"; break;
				case ("Portugal") :   $code = "pt"; break;
				case ("Romania") :   $code = "ro"; break;
				case ("Russian") :
				case ("Russia") :
				case ("Rusia") :
				case ("Russian Federation") :   $code = "ru"; break;
				case ("San Marino") :   $code = "sm"; break;
				case ("Serbia") :   $code = "rs"; break;
				case ("Slovakia") :   $code = "sk"; break;
				case ("Slovenia") :   $code = "si"; break;
				case ("Spain") :   $code = "es"; break;
				case ("Sweden") :   $code = "se"; break;
				case ("Switzerland") :   $code = "ch"; break;
				case ("Ukraine") :   $code = "ua"; break;
				case ("UK") :
				case ("United Kingdom") :   $code = "gb"; break;
				case ("American Samoa") :   $code = "as"; break;
				case ("Australia") :   $code = "au"; break;
				case ("Cook Islands") :   $code = "ck"; break;
				case ("Fiji") :   $code = "fj"; break;
				case ("French Polynesia") :   $code = "pf"; break;
				case ("Guam") :   $code = "gu"; break;
				case ("Kiribati") :   $code = "ki"; break;
				case ("Marshall Islands") :   $code = "mh"; break;
				case ("Micronesia") :
				case ("Micronesia, Federated States of") :   $code = "fm"; break;
				case ("Nauru") :   $code = "nr"; break;
				case ("New Caledonia") :   $code = "nc"; break;
				case ("New Zealand") :   $code = "nz"; break;
				case ("Palau") :   $code = "pw"; break;
				case ("Papua New Guinea") :   $code = "pg"; break;
				case ("Samoa") :   $code = "ws"; break;
				case ("Solomon Islands") :   $code = "sb"; break;
				case ("Tonga") :   $code = "to"; break;
				case ("Tuvalu") :   $code = "tv"; break;
				case ("Vanuatu") :   $code = "vu"; break;
				case ("Guernsey") :   $code = "gg"; break;
				case ("Isle of Man") :   $code = "im"; break;
				case ("Jersey") :   $code = "je"; break;
				
				default:
					$code = "";
					break;
			}
			return $code;
		}
	}
?>