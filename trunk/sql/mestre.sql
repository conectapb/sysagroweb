-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jan 12, 2013 as 02:13 PM
-- Versão do Servidor: 5.1.41
-- Versão do PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `mestre`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agendas`
--

CREATE TABLE IF NOT EXISTS `agendas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `fone` varchar(20) NOT NULL,
  `fone1` varchar(20) DEFAULT NULL,
  `fone2` varchar(20) DEFAULT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `site` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Extraindo dados da tabela `agendas`
--

INSERT INTO `agendas` (`id`, `nome`, `fone`, `fone1`, `fone2`, `celular`, `email`, `site`) VALUES
(3, 'Mario do caranda alterado com sucesso', '33-3333-3333', '33-3333-3333', '33-3333-3333', '33-3333-3333', 'caranda@caranda.com', 'www.prieto.com'),
(4, 'Itel Informatica', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'itel_informatica@hotmail.com', 'www.itel.com.br'),
(5, 'Lucas Rodrigues', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'clbr@gmail.com', 'www.lucaslinus.com.br'),
(6, 'Vizions', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'ademarfreitas@vizionbr.com.br', 'www.vizion.com.br'),
(7, 'Sistema Yotta', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'sistemayotta@gmail.com', 'http://.proinfo.com.br / 187.33.3.7/'),
(8, 'Cintia Treiner', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'cintia.oliveira@treiner.com.br', 'http://www.trainner.com.br/'),
(10, 'Fernando Pissuto Trevisan', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'estagio@bemago.com.br', 'www.bemago.com.br'),
(11, 'Mais Empresa', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'contato@maisempresas.com', 'http://www.maisempresas.com'),
(12, 'alterando ', '(33) 3333-3333', '(11) 1111-1111', '(22) 2222-2222', '(88) 8888-8888', 'www.gestaoativa.com.br', 'www.gestaoativa.com.br'),
(13, 'EAD-UFMS', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'herculessandim@gmail.com', 'http://www.ead.ufms.br/selecao/'),
(14, 'A Agence', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '1212DSDSDS', 'Carlos Cezar G. de Arruda'),
(15, 'Before TI', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'curriculo@before.com', 'www.before.com'),
(16, 'NDS Brasil Sol.', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'nds@nds.com.br', 'NDS Brasil Sol.'),
(18, 'Luiz Mota Totvs', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'luiz.mota@totvs.com.br', 'luiz.mota@totvs.com.br'),
(19, 'Tecsinapse', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'recrutamento@tecsinapse.com.br', 'http://www.tecsinapse.com.br/v3/html/'),
(20, 'Cometa Amambay', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '@gmail.com', 'http://www.ajbonito.com.br/index.php?idcanal=251'),
(22, 'Viação Motta', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'axel@gmail.com', 'ViaÃ§Ã£o Motta'),
(23, 'Viação Cruzeiro do Sul', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'axel@gmail.com', 'ViaÃ§Ã£o Cruzeiro do Sul'),
(24, 'Viação Andorinha', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'axel@gmail.com', 'ViaÃ§Ã£o Andorinha'),
(25, 'Expresso Queiroz', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'axel@gmail.com', 'Expresso Queiroz'),
(26, 'Informatica funlec', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'informatica@funlec.com.br', 'www.informatica@funlec.com.br'),
(27, 'Anhanguera', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '0800 941 4444', 'www.uniderp.br'),
(28, 'Renato  - redetendencia', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'renato.vieira@redetendencia.com.br', 'www.redetendencia.com.br'),
(29, 'AZ - katia', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'ksimoes@azi.com.br', 'www.azinformatica.com.br'),
(30, 'wilian SEGHR', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'wmachado@fazenda.ms.gov.br', 'wmachado@fazenda.ms.gov.br'),
(31, 'Mara SEGRH', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'não informado', 'não informado'),
(32, 'Joao Felipe', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'sem', 'sem'),
(33, 'Luis Pellat', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'sem', 'sem'),
(34, 'Maria Puta', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'mariaputa@hotmail.com', 'www.maria.com'),
(41, 'ultimo', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', '(99) 9999-9999', 'maria@maria.com', 'www.maria'),
(42, 'Axel Alexander Martins Benites ', '67-3291-3667', '67-3202-6128', '77-7777-7777', '67-8418-9991', 'axel_nomore@hotmail.com', 'http://axelalexander.webcindario.com'),
(44, 'pota que pariu', '99-9999-9999', '99-9999-9999', '99-9999-9999', '99-9999-9999', '9dsdsd', 'sdsds');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_paises`
--

CREATE TABLE IF NOT EXISTS `dados_paises` (
  `status` smallint(1) NOT NULL,
  `iso` char(2) NOT NULL,
  `iso3` char(3) NOT NULL,
  `numero` smallint(6) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`iso`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabela que contem os paises';

--
-- Extraindo dados da tabela `dados_paises`
--

INSERT INTO `dados_paises` (`status`, `iso`, `iso3`, `numero`, `nome`) VALUES
(1, 'AF', 'AFG', 4, 'Afeganistão'),
(1, 'ZA', 'ZAF', 710, 'África do Sul'),
(1, 'AX', 'ALA', 248, 'Åland, Ilhas'),
(1, 'AL', 'ALB', 8, 'Albânia'),
(1, 'DE', 'DEU', 276, 'Alemanha'),
(1, 'AD', 'AND', 20, 'Andorra'),
(1, 'AO', 'AGO', 24, 'Angola'),
(1, 'AI', 'AIA', 660, 'Anguilla'),
(1, 'AQ', 'ATA', 10, 'Antárctida'),
(1, 'AG', 'ATG', 28, 'Antigua e Barbuda'),
(1, 'AN', 'ANT', 530, 'Antilhas Holandesas'),
(1, 'SA', 'SAU', 682, 'Arábia Saudita'),
(1, 'DZ', 'DZA', 12, 'Argélia'),
(1, 'AR', 'ARG', 32, 'Argentina'),
(1, 'AM', 'ARM', 51, 'Arménia'),
(1, 'AW', 'ABW', 533, 'Aruba'),
(1, 'AU', 'AUS', 36, 'Austrália'),
(1, 'AT', 'AUT', 40, 'Áustria'),
(1, 'AZ', 'AZE', 31, 'Azerbeijão'),
(1, 'BS', 'BHS', 44, 'Bahamas'),
(1, 'BH', 'BHR', 48, 'Bahrain'),
(1, 'BD', 'BGD', 50, 'Bangladesh'),
(1, 'BB', 'BRB', 52, 'Barbados'),
(1, 'BE', 'BEL', 56, 'Bélgica'),
(1, 'BZ', 'BLZ', 84, 'Belize'),
(1, 'BJ', 'BEN', 204, 'Benin'),
(1, 'BM', 'BMU', 60, 'Bermuda'),
(1, 'BY', 'BLR', 112, 'Bielo-Rússia'),
(1, 'BO', 'BOL', 68, 'Bolívia'),
(1, 'BA', 'BIH', 70, 'Bósnia-Herzegovina'),
(1, 'BW', 'BWA', 72, 'Botswana'),
(1, 'BV', 'BVT', 74, 'Bouvet, Ilha'),
(1, 'BR', 'BRA', 76, 'Brasil'),
(1, 'BN', 'BRN', 96, 'Brunei'),
(1, 'BG', 'BGR', 100, 'Bulgária'),
(1, 'BF', 'BFA', 854, 'Burkina Faso'),
(1, 'BI', 'BDI', 108, 'Burundi'),
(1, 'BT', 'BTN', 64, 'Butão'),
(1, 'CV', 'CPV', 132, 'Cabo Verde'),
(1, 'KH', 'KHM', 116, 'Cambodja'),
(1, 'CM', 'CMR', 120, 'Camarões'),
(1, 'CA', 'CAN', 124, 'Canadá'),
(1, 'KY', 'CYM', 136, 'Cayman, Ilhas'),
(1, 'KZ', 'KAZ', 398, 'Cazaquistão'),
(1, 'CF', 'CAF', 140, 'Centro-africana, República'),
(1, 'TD', 'TCD', 148, 'Chade'),
(1, 'CZ', 'CZE', 203, 'Checa, República'),
(1, 'CL', 'CHL', 152, 'Chile'),
(1, 'CN', 'CHN', 156, 'China'),
(1, 'CY', 'CYP', 196, 'Chipre'),
(1, 'CX', 'CXR', 162, 'Christmas, Ilha'),
(1, 'CC', 'CCK', 166, 'Cocos, Ilhas'),
(1, 'CO', 'COL', 170, 'Colômbia'),
(1, 'KM', 'COM', 174, 'Comores'),
(1, 'CG', 'COG', 178, 'Congo, República do'),
(1, 'CD', 'COD', 180, 'Congo, República Democrática do (antigo Zaire)'),
(1, 'CK', 'COK', 184, 'Cook, Ilhas'),
(1, 'KR', 'KOR', 410, 'Coreia do Sul'),
(1, 'KP', 'PRK', 408, 'Coreia, República Democrática da (Coreia do Norte)'),
(1, 'CI', 'CIV', 384, 'Costa do Marfim'),
(1, 'CR', 'CRI', 188, 'Costa Rica'),
(1, 'HR', 'HRV', 191, 'Croácia'),
(1, 'CU', 'CUB', 192, 'Cuba'),
(1, 'DK', 'DNK', 208, 'Dinamarca'),
(1, 'DJ', 'DJI', 262, 'Djibouti'),
(1, 'DM', 'DMA', 212, 'Dominica'),
(1, 'DO', 'DOM', 214, 'Dominicana, República'),
(1, 'EG', 'EGY', 818, 'Egipto'),
(1, 'SV', 'SLV', 222, 'El Salvador'),
(1, 'AE', 'ARE', 784, 'Emiratos Árabes Unidos'),
(1, 'EC', 'ECU', 218, 'Equador'),
(1, 'ER', 'ERI', 232, 'Eritreia'),
(1, 'SK', 'SVK', 703, 'Eslováquia'),
(1, 'SI', 'SVN', 705, 'Eslovénia'),
(1, 'ES', 'ESP', 724, 'Espanha'),
(1, 'US', 'USA', 840, 'Estados Unidos da América'),
(1, 'EE', 'EST', 233, 'Estónia'),
(1, 'ET', 'ETH', 231, 'Etiópia'),
(1, 'FO', 'FRO', 234, 'Faroe, Ilhas'),
(1, 'FJ', 'FJI', 242, 'Fiji'),
(1, 'PH', 'PHL', 608, 'Filipinas'),
(1, 'FI', 'FIN', 246, 'Finlândia'),
(1, 'FR', 'FRA', 250, 'França'),
(1, 'GA', 'GAB', 266, 'Gabão'),
(1, 'GM', 'GMB', 270, 'Gâmbia'),
(1, 'GH', 'GHA', 288, 'Gana'),
(1, 'GE', 'GEO', 268, 'Geórgia'),
(1, 'GS', 'SGS', 239, 'Geórgia do Sul e Sandwich do Sul, Ilhas'),
(1, 'GI', 'GIB', 292, 'Gibraltar'),
(1, 'GR', 'GRC', 300, 'Grécia'),
(1, 'GD', 'GRD', 308, 'Grenada'),
(1, 'GL', 'GRL', 304, 'Gronelândia'),
(1, 'GP', 'GLP', 312, 'Guadeloupe'),
(1, 'GU', 'GUM', 316, 'Guam'),
(1, 'GT', 'GTM', 320, 'Guatemala'),
(1, 'GG', 'GGY', 831, 'Guernsey'),
(1, 'GY', 'GUY', 328, 'Guiana'),
(1, 'GF', 'GUF', 254, 'Guiana Francesa'),
(1, 'GW', 'GNB', 624, 'Guiné-Bissau'),
(1, 'GN', 'GIN', 324, 'Guiné-Conacri'),
(1, 'GQ', 'GNQ', 226, 'Guiné Equatorial'),
(1, 'HT', 'HTI', 332, 'Haiti'),
(1, 'HM', 'HMD', 334, 'Heard e Ilhas McDonald, Ilha'),
(1, 'HN', 'HND', 340, 'Honduras'),
(1, 'HK', 'HKG', 344, 'Hong Kong'),
(1, 'HU', 'HUN', 348, 'Hungria'),
(1, 'YE', 'YEM', 887, 'Iémen'),
(1, 'IN', 'IND', 356, 'Índia'),
(1, 'ID', 'IDN', 360, 'Indonésia'),
(1, 'IQ', 'IRQ', 368, 'Iraque'),
(1, 'IR', 'IRN', 364, 'Irão'),
(1, 'IE', 'IRL', 372, 'Irlanda'),
(1, 'IS', 'ISL', 352, 'Islândia'),
(1, 'IL', 'ISR', 376, 'Israel'),
(1, 'IT', 'ITA', 380, 'Itália'),
(1, 'JM', 'JAM', 388, 'Jamaica'),
(1, 'JP', 'JPN', 392, 'Japão'),
(1, 'JE', 'JEY', 832, 'Jersey'),
(1, 'JO', 'JOR', 400, 'Jordânia'),
(1, 'KI', 'KIR', 296, 'Kiribati'),
(1, 'KW', 'KWT', 414, 'Kuwait'),
(1, 'LA', 'LAO', 418, 'Laos'),
(1, 'LS', 'LSO', 426, 'Lesoto'),
(1, 'LV', 'LVA', 428, 'Letónia'),
(1, 'LB', 'LBN', 422, 'Líbano'),
(1, 'LR', 'LBR', 430, 'Libéria'),
(1, 'LY', 'LBY', 434, 'Líbia'),
(1, 'LI', 'LIE', 438, 'Liechtenstein'),
(1, 'LT', 'LTU', 440, 'Lituânia'),
(1, 'LU', 'LUX', 442, 'Luxemburgo'),
(1, 'MO', 'MAC', 446, 'Macau'),
(1, 'MK', 'MKD', 807, 'Macedónia, República da'),
(1, 'MG', 'MDG', 450, 'Madagáscar'),
(1, 'MY', 'MYS', 458, 'Malásia'),
(1, 'MW', 'MWI', 454, 'Malawi'),
(1, 'MV', 'MDV', 462, 'Maldivas'),
(1, 'ML', 'MLI', 466, 'Mali'),
(1, 'MT', 'MLT', 470, 'Malta'),
(1, 'FK', 'FLK', 238, 'Malvinas, Ilhas (Falkland)'),
(1, 'IM', 'IMN', 833, 'Man, Ilha de'),
(1, 'MP', 'MNP', 580, 'Marianas Setentrionais'),
(1, 'MA', 'MAR', 504, 'Marrocos'),
(1, 'MH', 'MHL', 584, 'Marshall, Ilhas'),
(1, 'MQ', 'MTQ', 474, 'Martinica'),
(1, 'MU', 'MUS', 480, 'Maurícia'),
(1, 'MR', 'MRT', 478, 'Mauritânia'),
(1, 'YT', 'MYT', 175, 'Mayotte'),
(1, 'UM', 'UMI', 581, 'Menores Distantes dos Estados Unidos, Ilhas'),
(1, 'MX', 'MEX', 484, 'México'),
(1, 'MM', 'MMR', 104, 'Myanmar (antiga Birmânia)'),
(1, 'FM', 'FSM', 583, 'Micronésia, Estados Federados da'),
(1, 'MZ', 'MOZ', 508, 'Moçambique'),
(1, 'MD', 'MDA', 498, 'Moldávia'),
(1, 'MC', 'MCO', 492, 'Mónaco'),
(1, 'MN', 'MNG', 496, 'Mongólia'),
(1, 'ME', 'MNE', 499, 'Montenegro'),
(1, 'MS', 'MSR', 500, 'Montserrat'),
(1, 'NA', 'NAM', 516, 'Namíbia'),
(1, 'NR', 'NRU', 520, 'Nauru'),
(1, 'NP', 'NPL', 524, 'Nepal'),
(1, 'NI', 'NIC', 558, 'Nicarágua'),
(1, 'NE', 'NER', 562, 'Níger'),
(1, 'NG', 'NGA', 566, 'Nigéria'),
(1, 'NU', 'NIU', 570, 'Niue'),
(1, 'NF', 'NFK', 574, 'Norfolk, Ilha'),
(1, 'NO', 'NOR', 578, 'Noruega'),
(1, 'NC', 'NCL', 540, 'Nova Caledónia'),
(1, 'NZ', 'NZL', 554, 'Nova Zelândia (Aotearoa)'),
(1, 'OM', 'OMN', 512, 'Oman'),
(1, 'NL', 'NLD', 528, 'Países Baixos (Holanda)'),
(1, 'PW', 'PLW', 585, 'Palau'),
(1, 'PS', 'PSE', 275, 'Palestina'),
(1, 'PA', 'PAN', 591, 'Panamá'),
(1, 'PG', 'PNG', 598, 'Papua-Nova Guiné'),
(1, 'PK', 'PAK', 586, 'Paquistão'),
(1, 'PY', 'PRY', 600, 'Paraguai'),
(1, 'PE', 'PER', 604, 'Peru'),
(1, 'PN', 'PCN', 612, 'Pitcairn'),
(1, 'PF', 'PYF', 258, 'Polinésia Francesa'),
(1, 'PL', 'POL', 616, 'Polónia'),
(1, 'PR', 'PRI', 630, 'Porto Rico'),
(1, 'PT', 'PRT', 620, 'Portugal'),
(1, 'QA', 'QAT', 634, 'Qatar'),
(1, 'KE', 'KEN', 404, 'Quénia'),
(1, 'KG', 'KGZ', 417, 'Quirguistão'),
(1, 'GB', 'GBR', 826, 'Reino Unido da Grã-Bretanha e Irlanda do Norte'),
(1, 'RE', 'REU', 638, 'Reunião'),
(1, 'RO', 'ROU', 642, 'Roménia'),
(1, 'RW', 'RWA', 646, 'Ruanda'),
(1, 'RU', 'RUS', 643, 'Rússia'),
(1, 'EH', 'ESH', 732, 'Saara Ocidental'),
(1, 'AS', 'ASM', 16, 'Samoa Americana'),
(1, 'WS', 'WSM', 882, 'Samoa (Samoa Ocidental)'),
(1, 'PM', 'SPM', 666, 'Saint Pierre et Miquelon'),
(1, 'SB', 'SLB', 90, 'Salomão, Ilhas'),
(1, 'KN', 'KNA', 659, 'São Cristóvão e Névis (Saint Kitts e Nevis)'),
(1, 'SM', 'SMR', 674, 'San Marino'),
(1, 'ST', 'STP', 678, 'São Tomé e Príncipe'),
(1, 'VC', 'VCT', 670, 'São Vicente e Granadinas'),
(1, 'SH', 'SHN', 654, 'Santa Helena'),
(1, 'LC', 'LCA', 662, 'Santa Lúcia'),
(1, 'SN', 'SEN', 686, 'Senegal'),
(1, 'SL', 'SLE', 694, 'Serra Leoa'),
(1, 'RS', 'SRB', 688, 'Sérvia'),
(1, 'SC', 'SYC', 690, 'Seychelles'),
(1, 'SG', 'SGP', 702, 'Singapura'),
(1, 'SY', 'SYR', 760, 'Síria'),
(1, 'SO', 'SOM', 706, 'Somália'),
(1, 'LK', 'LKA', 144, 'Sri Lanka'),
(1, 'SZ', 'SWZ', 748, 'Suazilândia'),
(1, 'SD', 'SDN', 736, 'Sudão'),
(1, 'SE', 'SWE', 752, 'Suécia'),
(1, 'CH', 'CHE', 756, 'Suíça'),
(1, 'SR', 'SUR', 740, 'Suriname'),
(1, 'SJ', 'SJM', 744, 'Svalbard e Jan Mayen'),
(1, 'TH', 'THA', 764, 'Tailândia'),
(1, 'TW', 'TWN', 158, 'Taiwan'),
(1, 'TJ', 'TJK', 762, 'Tajiquistão'),
(1, 'TZ', 'TZA', 834, 'Tanzânia'),
(1, 'TF', 'ATF', 260, 'Terras Austrais e Antárticas Francesas (TAAF)'),
(1, 'IO', 'IOT', 86, 'Território Britânico do Oceano Índico'),
(1, 'TL', 'TLS', 626, 'Timor-Leste'),
(1, 'TG', 'TGO', 768, 'Togo'),
(1, 'TK', 'TKL', 772, 'Toquelau'),
(1, 'TO', 'TON', 776, 'Tonga'),
(1, 'TT', 'TTO', 780, 'Trindade e Tobago'),
(1, 'TN', 'TUN', 788, 'Tunísia'),
(1, 'TC', 'TCA', 796, 'Turks e Caicos'),
(1, 'TM', 'TKM', 795, 'Turquemenistão'),
(1, 'TR', 'TUR', 792, 'Turquia'),
(1, 'TV', 'TUV', 798, 'Tuvalu'),
(1, 'UA', 'UKR', 804, 'Ucrânia'),
(1, 'UG', 'UGA', 800, 'Uganda'),
(1, 'UY', 'URY', 858, 'Uruguai'),
(1, 'UZ', 'UZB', 860, 'Usbequistão'),
(1, 'VU', 'VUT', 548, 'Vanuatu'),
(1, 'VA', 'VAT', 336, 'Vaticano'),
(1, 'VE', 'VEN', 862, 'Venezuela'),
(1, 'VN', 'VNM', 704, 'Vietname'),
(1, 'VI', 'VIR', 850, 'Virgens Americanas, Ilhas'),
(1, 'VG', 'VGB', 92, 'Virgens Britânicas, Ilhas'),
(1, 'WF', 'WLF', 876, 'Wallis e Futuna'),
(1, 'ZM', 'ZMB', 894, 'Zâmbia'),
(1, 'ZW', 'ZWE', 716, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_sistema`
--

CREATE TABLE IF NOT EXISTS `empresa_sistema` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cnpf_cpf` varchar(20) NOT NULL,
  `ie_rg` varchar(20) NOT NULL,
  `razao_social` varchar(50) NOT NULL,
  `nome_fantasia` varchar(50) NOT NULL,
  `endereco` varchar(50) NOT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `atividade` varchar(50) DEFAULT NULL,
  `fone` varchar(14) DEFAULT NULL,
  `celular` varchar(14) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `data_fundacao` date DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `empresa_sistema`
--

INSERT INTO `empresa_sistema` (`id`, `cnpf_cpf`, `ie_rg`, `razao_social`, `nome_fantasia`, `endereco`, `bairro`, `cep`, `atividade`, `fone`, `celular`, `email`, `data_fundacao`, `uf`, `cidade`) VALUES
(1, '00100200000198', '98456', 'Razao Social', 'Nome fantazia', 'endereço', 'bairro', '79002182', 'Iformática', '67 329139667', '67 84189991', 'axelpatto@gmail.com', '1992-08-12', 'MS', 'CAMPO GRANDE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mestre_produtos`
--

CREATE TABLE IF NOT EXISTS `mestre_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) NOT NULL,
  `marca_id` int(11) NOT NULL,
  `modelo_id` int(11) NOT NULL,
  `unidade_id` int(11) NOT NULL,
  `codBarras` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `refFabricante` varchar(50) NOT NULL,
  `refAuxiliar` varchar(50) NOT NULL,
  `icmsc` double(10,2) NOT NULL,
  `icmsv` double(10,2) NOT NULL,
  `ipiVenda` double(10,2) NOT NULL,
  `cst` varchar(50) NOT NULL,
  `margenLucro` int(11) NOT NULL,
  `precoCusto` double(10,2) NOT NULL,
  `precoVenda` double(10,2) NOT NULL,
  `margenDesconto` int(11) NOT NULL,
  `tipi` int(11) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `ncm` varchar(50) NOT NULL,
  `genero_id` int(11) NOT NULL,
  `cor_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `mestre_produtos`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text NOT NULL,
  `titulo` text NOT NULL,
  `pasta` varchar(100) NOT NULL DEFAULT '',
  `descricao` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `modulos`
--

INSERT INTO `modulos` (`id`, `nome`, `titulo`, `pasta`, `descricao`) VALUES
(1, 'cliente', 'Cadastro de clientes', 'cliente', 'Clientes Cadastrados no Sistema'),
(2, 'noticias', 'Cadastro de Noticias', 'noticias', 'modulo de destaque'),
(3, 'usuario', 'Cadastro de Usuário', 'usuario', 'pasta de usuário'),
(4, 'CategoriaVagas', 'Cadeastro de Vagas', 'categoriaVaga', 'Categoria de Vagas'),
(5, 'Parceiros', 'Cadastro de Parceiros', 'parceiros', 'Cadastro de Parceiros'),
(6, 'uploads', 'Uploads de Arquivos', 'uploads', 'uploads de arquivos'),
(7, 'categorias', 'Categorias de Artigos', 'albumcategoria', 'Categorias dos Artigos'),
(8, 'CategoriaNoticia', 'Categoria de Notícias', 'categoriaNoticia', 'Categoria de Noticias'),
(9, 'Portifolio', 'Lista de Portifolios', 'portifolio', 'sites desnfolvidos'),
(10, 'agenda', 'Agenda Telefonica', 'agenda', 'Agenda telefonica'),
(11, 'categoriaPost', 'Categoria de Post', 'categoriaPost', 'Cadastro de Categoria Post'),
(12, 'post', 'Cadastro de Post', 'post', 'Cadastro de Post');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_usuario`
--

CREATE TABLE IF NOT EXISTS `nivel_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `nivel_usuario`
--

INSERT INTO `nivel_usuario` (`id`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'DBA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto`
--

CREATE TABLE IF NOT EXISTS `ponto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registro` date NOT NULL DEFAULT '0000-00-00',
  `func_matricula` int(11) NOT NULL,
  `horaE1` time DEFAULT NULL,
  `horaS1` time DEFAULT NULL,
  `horaE2` time DEFAULT NULL,
  `horaS2` time DEFAULT NULL,
  `reg_data_hora` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `data_criacao` datetime DEFAULT '0000-00-00 00:00:00',
  `data_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `ponto`
--

INSERT INTO `ponto` (`id`, `registro`, `func_matricula`, `horaE1`, `horaS1`, `horaE2`, `horaS2`, `reg_data_hora`, `data_criacao`, `data_alteracao`) VALUES
(1, '2012-07-28', 1519168178, '07:30:00', '11:30:00', '13:30:00', '17:30:00', '2012-07-28 12:23:00', '2012-07-28 12:23:00', '2012-07-28 14:27:33');

--
-- Gatilhos `ponto`
--
DROP TRIGGER IF EXISTS `tgg_ponto_insert_data_criacao`;
DELIMITER //
CREATE TRIGGER `tgg_ponto_insert_data_criacao` BEFORE INSERT ON `ponto`
 FOR EACH ROW SET NEW.data_criacao = NOW() , NEW.registro = NOW()
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reg_pessoas`
--

CREATE TABLE IF NOT EXISTS `reg_pessoas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `data_cadastro` date DEFAULT NULL,
  `data_alteracao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo` char(10) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `sexo` char(10) DEFAULT NULL,
  `est_civil` varchar(20) DEFAULT NULL,
  `cor` varchar(15) DEFAULT NULL,
  `naturalidade` varchar(40) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `reg_pessoas`
--

INSERT INTO `reg_pessoas` (`id`, `data_cadastro`, `data_alteracao`, `tipo`, `cpf`, `rg`, `nome`, `sexo`, `est_civil`, `cor`, `naturalidade`, `data_nasc`) VALUES
(1, '0000-00-00', '2012-11-18 18:42:49', 'Fisica', '1212121', '1212121', 'mal do caralho', '0', 'Casada', 'Negro', 'ZAF', '2012-11-30'),
(2, '0000-00-00', '2012-11-18 18:44:00', 'Fisica', '1212121', '1212121', 'mal do caralho', '0', 'Casada', 'Negro', 'ZAF', '2012-11-30'),
(3, '0000-00-00', '2012-11-18 18:45:01', 'Fisica', '1212121', '1212121', 'mal do caralho', '0', 'Casada', 'Negro', 'ZAF', '2012-11-30'),
(4, '2012-11-18', '2012-11-18 18:45:34', 'Fisica', '1212121', '1212121', 'mal do caralho', '0', 'Casada', 'Negro', 'ZAF', '2012-11-30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reg_pessoas_profissional`
--

CREATE TABLE IF NOT EXISTS `reg_pessoas_profissional` (
  `id` int(10) NOT NULL,
  `profissao` varchar(150) NOT NULL,
  `atividade` text,
  `reg_pessoa_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Fk_Reg_pessoas` (`reg_pessoa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabela que contem os dados proficional da tabela pessoa';

--
-- Extraindo dados da tabela `reg_pessoas_profissional`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `site_about`
--

CREATE TABLE IF NOT EXISTS `site_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `quemsou` text NOT NULL,
  `quemfaco` text NOT NULL,
  `filosofia` text NOT NULL,
  `nossamissao` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `site_about`
--

INSERT INTO `site_about` (`id`, `nome`, `quemsou`, `quemfaco`, `filosofia`, `nossamissao`) VALUES
(1, 'Axel Alexander Martins Benites', 'Atualmente trabalho em uma empresa de Recursos Humanos, desenvolvendo formulârios eletrônicos para o governo do Estado de Matogrosso do SUL é também desenvolvo software para algumas pessoas que me contrataram, nas minhas horas vagas atuo como freelancer.\r\n\r\n\r\nDefiniçâo para freelancer:\r\nmotivaçâo que pode ter uma pessoa para se converter em um desenvolvedor independente.\r\n\r\nSeguem a descriçâo dos meus serviços abaixo', '<h3>Sites Web</h3>\r\n	<p>\r\n    Desenvolvimento websites procurando seguir a linha clean(leves), isso n&acirc;o quer \r\n    dizer que s&acirc;o feios, uso anima&ccedil;&ocirc;es qualquer recurso desejado, \r\n    tamb&eacute;mfa&ccedil;o sites totalmente din&acirc;micos e interativos usando banco \r\n    de dados e pagina de acesso restrito para edi&ccedil;&aacute;o de informa&ccedil;&ocirc;es.	\r\n    </p>\r\n	<br />\r\n	<h2>Tecnologias que eventualmente uso</h2>\r\n    <br/>\r\n        <ul>\r\n            <li>HTML</li>\r\n            <li>CSS</li>\r\n            <li>JAVA SCRIPT </li>\r\n            <li>POSTGRESQL</li>\r\n            <li>ASP </li>\r\n            <li>PHP </li>\r\n            <li>MYSQL </li>\r\n            <li>ACCESS </li>\r\n            <li>MSSQL SERVER</li>\r\n            <li>XML</li>\r\n        </ul>\r\n   <br/>  \r\n    <p>\r\n    N&acirc;o hospedo o site, mas fa&ccedil;o todo o acompanhamento e configura&ccedil;&Acirc;o\r\n    do servidor, indico empresas que hospedam realmente são confi&aacute;veis, independente da\r\n    tecnologia aplicada.\r\n    </p>\r\n	<br />\r\n	<h3>Sistemas Desktop</h3>\r\n	<p>\r\n    Desenvolvo sistemas de controle e gest&acirc;o, porem estou pronto pra qualquer desafio, 	\r\n    fico responsável pela analise e pelo desenvolvimento, dependendo do sistema fa&ccedil;o em \r\n    conjunto (com parceiros de confian&ccedil;a e car&aacute;ter)....em todo os meus projetos 	\r\n    aplico layout bacanas, bonitos, e bem padronizados</p>\r\n    <br />\r\n    <h2>Tecnologias que aplico</h2>\r\n    <br />\r\n    <h3>Plataforma Windows:</h3>\r\n    <br />\r\n	     <ul>\r\n           <li>DELPHI </li>\r\n           <li>ASP.NET </li>\r\n           <li>JAVA </li>\r\n           <li>MSSQL SERVER </li>\r\n           <li>MYSQL </li>\r\n           <li>ACCESS </li>\r\n           <li>POSTGRESQL </li> \r\n           <li>FIREBIRD </li>\r\n        </ul>  \r\n 	<br />\r\n	<h3>Plataforma Linux:</h3>\r\n    <br />\r\n	 <ul>\r\n        <li>Kilyx </li>\r\n        <li>JAVA </li>\r\n        <li>PHP </li>\r\n        <li>MYSQL </li>\r\n        <li>POSTGRESQL </li> \r\n        <li>FIREBIRD </li>\r\n    </ul>\r\n	<br />\r\n	<br />\r\n	\r\n    <h2>Formatar e configura&ccedil;&acirc;o de M&acirc;quinas</h2>\r\n	<p>\r\n    Servi&ccedil;o de formata&ccedil;&acirc;o da m&acirc;quinas com backup, instal\r\n    &ccedil;&atilde;o de drivers e os programas mais 	usados, ou que for desejado.</p>', 'oferecer soluçôes eficientes para capturar, armazenar, encontrar, compartilhar e analisar dados, transformando-os em informaçôes úteis, com profissionalismo e qualidade que satisfaçam suas necessidades, tornando-os mais fortes e competitivos em seus mercados e segmentos de açâo.', 'Ser uma empresa inovadora, oferecendo soluçôes de qualidade em tecnologia, visando atender as mais diversas oportunidades de negócios;\r\n\r\nEncantar nossos clientes, superando suas expectativas através da qualidade de nossas soluçôes e serviços, com ética, preço justo e qualidade;\r\n\r\nContribuir para o desenvolvimento de uma sociedade educada e avançada economicamente e socialmente.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_artigos`
--

CREATE TABLE IF NOT EXISTS `site_artigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `comentario` text NOT NULL,
  `noticia` text NOT NULL,
  `foto` text NOT NULL,
  `data` date NOT NULL,
  `fonte` varchar(255) NOT NULL,
  `ativo` char(2) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `site_artigos`
--

INSERT INTO `site_artigos` (`id`, `titulo`, `comentario`, `noticia`, `foto`, `data`, `fonte`, `ativo`) VALUES
(1, 'dfdfd', 'fdfd', 'fdf', 'dfdfdf', '0000-00-00', '', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_categoria_noticias`
--

CREATE TABLE IF NOT EXISTS `site_categoria_noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `site_categoria_noticias`
--

INSERT INTO `site_categoria_noticias` (`id`, `descricao`) VALUES
(1, 'Esportes'),
(2, 'Politica'),
(3, 'Informatica'),
(4, 'Religião'),
(5, 'Rock');

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_categoria_post`
--

CREATE TABLE IF NOT EXISTS `site_categoria_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tablea que contem as categorias do  post divulgado na intern' AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `site_categoria_post`
--

INSERT INTO `site_categoria_post` (`id`, `descricao`) VALUES
(1, 'PHP'),
(2, 'Oracle'),
(3, 'Linux'),
(4, 'Android'),
(7, 'C#'),
(15, 'java'),
(21, 'prototype'),
(22, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_categoria_vaga`
--

CREATE TABLE IF NOT EXISTS `site_categoria_vaga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `site_categoria_vaga`
--

INSERT INTO `site_categoria_vaga` (`id`, `descricao`) VALUES
(1, 'Analista de Banco de Dados '),
(2, 'Analista de Sistemas'),
(11, 'Desenvolvedor'),
(12, 'Pedreiro'),
(13, 'Contabilidade'),
(14, 'Serviços Gerais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_contato`
--

CREATE TABLE IF NOT EXISTS `site_contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(170) DEFAULT NULL,
  `endereco` varchar(170) DEFAULT NULL,
  `bairro` varchar(170) DEFAULT NULL,
  `email` varchar(170) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `site_contato`
--

INSERT INTO `site_contato` (`id`, `nome`, `endereco`, `bairro`, `email`, `telefone`, `celular`) VALUES
(1, 'Axel Alexander', 'Dom Aquino 2242', 'Centro', 'axel_nomore@hotmail.com', '(067) 3291-3667', '(067) 8418-9991'),
(2, 'teste', '', '', 'axel_nomore@globomail.com', '', '(66) 6666-6666'),
(3, 'Axel Alexander ', '', '', 'axel_nomore@hotmail.com', '', '(99) 9999-9999');

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_curriculun`
--

CREATE TABLE IF NOT EXISTS `site_curriculun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `idade` int(11) DEFAULT NULL,
  `data_nasc` date NOT NULL,
  `sexo` char(1) DEFAULT NULL,
  `endereco` varchar(150) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `objetivo` text NOT NULL,
  `qualificacao` text NOT NULL,
  `outra_informacao` text NOT NULL,
  `experiencia` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `site_curriculun`
--

INSERT INTO `site_curriculun` (`id`, `nome`, `idade`, `data_nasc`, `sexo`, `endereco`, `bairro`, `email`, `telefone`, `celular`, `objetivo`, `qualificacao`, `outra_informacao`, `experiencia`) VALUES
(1, 'Axel Alexander Martins Benites', 25, '1995-10-10', 'M', 'Dom Aquino 2242', 'Centro', 'axel_nomore@hotm.com', '67 30294015', '67 84189991', 'Desenvolvimento de Sistemas, programaçâo, banco de dados, e outros setores administrativos de empresas privadas e públicas, coloco em prática os conhecimentos e experiências adquiridos até o momento.', '<ul>\r\n<li>Pós graduado em Desenvolvimento de Aplicações Utilizando a Tecnologia JAVA \r\n<br /><br /> \r\n</li><li>Ensino Superior - Graduado em Tecnologia em Análise e Desenvolvimento de Sistema.\r\n<span>"Concluído" em 2008</span>\r\n<br /><br /> \r\n</li><li>Ensino Médio - Escola Santa Teresa (Don Bosco) - <span>"Concluido" em 2004</span>\r\n<br /><br />\r\n</li><li>Técnico em Informática pelo SENAI - \r\n<span>"Concluido" em 2004</span>\r\n<br /><br />\r\n</li>\r\n</ul>', 'Falo e escrevo fluentemente em Espanhol. Possuo total disponibilidade para deslocamento entre mais de uma localidade de trabalho.', '<ul>\r\n<li>Cargo: Analista de Sistemas - Março de 2010 PSG Recursos Humanos \r\nCampo Grande - MS (67) fone: 3382-4458 \r\n<br />\r\n<span> Príncipais responsabilidades: Desenvolvimento de Formul&aacute;rios \r\nEletronicos .</span></li>\r\n<br/>\r\n<li>Cargo: Programador Delphi e PHP - Janeiro de 2010 a Mar&ccedil;o 2010 Gênesis \r\nInformática Campo Grande - MS  fone: (67)3325-0300 \r\n<br />\r\n<span> Principais responsabilidades: Desenvolvimento de sistemas e web Sites.</span>\r\n</li>\r\n<br/>\r\n<li>Cargo: Programador - Outubro de 2009 a Novembro de 2009 Astemac Automação Campo Grande - MS Comercial fone: (67) 3326-7056 - 3326-5978\r\n<br />\r\n<span>Principais responsabilidades: Desenvolvimento de sistemas comerciais.</span></li>\r\n<br/>\r\n<li> Cargo: Analista Programador Delphi - Julho de 2009 a Setembro de 2009 Data Control São Gabriel do Oeste - MS fone:(67) 3295-6047\r\n<br />\r\n<span>Principais responsabilidades: Desenvolvimento de sistemas comerciais.</span>\r\n</li>\r\n<br/>\r\n</ul> \r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_dicas`
--

CREATE TABLE IF NOT EXISTS `site_dicas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(70) DEFAULT NULL,
  `descricao` text,
  `autor` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `ativo` varchar(5) NOT NULL DEFAULT 'NÃO',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `site_dicas`
--

INSERT INTO `site_dicas` (`id`, `titulo`, `descricao`, `autor`, `email`, `ativo`) VALUES
(1, 'Estação marinha do ano', 'fgfg', 'Axel', 'fgfgfgf', 'Sim'),
(2, 'calsinha', 'jjjjjjjjj', 'maria', 'jjjjjjjjjjjjjjjjj', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_noticias`
--

CREATE TABLE IF NOT EXISTS `site_noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text NOT NULL,
  `comentario` text NOT NULL,
  `noticia` text NOT NULL,
  `foto` text NOT NULL,
  `data` date NOT NULL,
  `fonte` varchar(255) NOT NULL,
  `ativo` char(2) NOT NULL DEFAULT 'N',
  `categoria_noticia_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categoria_noticia` (`categoria_noticia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `site_noticias`
--

INSERT INTO `site_noticias` (`id`, `titulo`, `comentario`, `noticia`, `foto`, `data`, `fonte`, `ativo`, `categoria_noticia_id`) VALUES
(1, 'PIB brasileiro registra crescimento de 0,6% no 3º trimestre', 'Dado é em comparação com o trimestre anterior. Em relação ao terceiro trimestre de 2011, o PIB apresentou alta de 0,9% ', 'O resultado veio abaixo do piso das estimativas dos analistas consultados pelo AE Projeções (de 0,9% a 1,4%). A mediana era de 1,2%.\r\n\r\nNa comparação com o terceiro trimestre de 2011, o PIB apresentou alta de 0,9% no terceiro trimestre deste ano, abaixo do piso das estimativas do AE Projeções, que variavam de 1,1% a 2,12%, com mediana de 1,9%.\r\n\r\nNo ano, o PIB avançou 0,7%, na comparação com o mesmo período de 2011.\r\n\r\nConsumo das famílias cresce 0,9%\r\n\r\nO consumo das famílias, segundo o IBGE, registrou alta de 0,9% no terceiro trimestre de 2012 em relação ao segundo trimestre do ano. Já na comparação com o terceiro trimestre de 2011, o consumo das famílias aumentou 3,4% no terceiro trimestre de 2012. No ano, o consumo das famílias subiu 2,8% até setembro ante o mesmo período do ano passado.\r\n\r\nSegundo o IBGE, que divulga nesta sexta-feira os dados das Contas Nacionais Trimestrais, o consumo do governo, por sua vez, teve alta de 0,1% no terceiro trimestre ante o segundo trimestre de 2012. Na comparação com o terceiro trimestre do ano passado, o indicador subiu 3,2%. No ano, o consumo estatal avançou 3,2% ante o mesmo período do ano passado.\r\n\r\nServiços\r\n\r\nO PIB de serviços ficou estável (0,0%) no terceiro trimestre deste ano, na comparação com o segundo trimestre. Em relação ao terceiro trimestre de 2011, o indicador mostrou alta de 1 4% no terceiro trimestre de 2012.\r\n\r\nNo acumulado dos nove primeiros meses do ano, o PIB de serviços subiu 1,5% ante o mesmo período do ano passado.\r\n\r\nIndústria\r\n\r\nO PIB da indústria subiu 1,1% no terceiro trimestre de 2012 ante o segundo trimestre deste ano. Na comparação com o terceiro trimestre de 2011, o indicador mostrou queda de 0,9%. No acumulado do ano, até setembro, o PIB da industrial caiu 1,1% ante o mesmo período do ano passado.\r\n\r\nAgropecuária\r\n\r\nO PIB da agropecuária cresceu 2,5% no terceiro trimestre deste ano na comparação com segundo trimestre de 2012. Na comparação com o terceiro trimestre de 2011, o industrial teve aumento de 3,6%. No acumulado do ano, até setembro, o PIB da agropecuária caiu 1% ante o mesmo período do ano passado.\r\n\r\nExportações sobem 0,2% no 3º trimestre\r\n\r\nAs exportações cresceram 0,2% no terceiro trimestre em relação ao segundo trimestre do ano. Na comparação com o terceiro trimestre de 2011, as vendas externas caíram 3,2%. No ano, as exportações recuaram 0,1% ante o mesmo período do ano passado. As informações também fazem parte da divulgação do IBGE das Contas Nacionais Trimestrais, que incluem o PIB.\r\n\r\nSegundo o instituto, as importações contabilizadas no PIB caíram 6,5% no terceiro trimestre na comparação com o segundo trimestre do ano. Em relação ao terceiro trimestre de 2011, as importações caíram 6,4%. No ano, as importações avançaram 0,2% ante o mesmo período do ano passado.\r\n\r\nA contabilidade das exportações e importações no PIB é diferente da realizada para a elaboração da balança comercial. No PIB, entram bens e serviços e as variações porcentuais divulgadas dizem respeito ao volume. Já na balança comercial, entram somente bens e o registro é feito em valores, com grande influência dos preços.', '201201211929c23d8d845608adb6de6ee5ea0ee9f768.jpg', '2011-01-09', 'http://www.portaldoagronegocio.com.br/conteudo.php?tit=pib_brasileiro_registra_crescimento_de_0,6_no_3_trimestre&id=85348', 'S', 1),
(2, 'Frango: preços são os maiores da série do Cepea', 'As cotações do animal vivo, da carne e dos cortes atingiram os maiores patamares da série histórica do Cepea, iniciada em 2004, em termos nominais', 'Segundo colaboradores do Cepea, o impulso tem vindo da menor oferta de animais e também da demanda, que se mantém aquecida mesmo com o repasse das altas do frango vivo. Vale lembrar, no entanto, que os custos de produção seguem elevados.\r\n\r\nNo mercado de cortes resfriados, agentes atacadistas comentam que a procura está bastante aquecida especialmente por peito de frango e filé de peito. Um dos motivos é o aumento do poder aquisitivo com o recebimento da primeira parcela do 13° em novembro. Outro fator que favorece a comercialização desses cortes são as temperaturas mais elevadas neste período do ano – o peito de frango e o filé de peito são normalmente associados a uma alimentação mais “leve”.', '2012011523125bf649f8509b864f53b1320ed886bd59.jpg', '2011-01-09', 'http://www.portaldoagronegocio.com.br/conteudo.php?tit=frango_precos_s', 'S', 1),
(3, 'Boa oferta e demanda fraca colaboram para a baixa do boi', 'O aumento da oferta de boiadas e os preços frouxos no mercado de carne com osso, com consumo abaixo do esperado para novembro, forçam os frigoríficos a ofertarem cada vez menos pela arroba', 'As exportações também estão menores.\r\n\r\nEstes fatores atingem todas as praças pecuárias do país. Houve queda em oito das 31 praças pesquisadas.\r\n\r\nSegundo levantamento da Scot Consultoria, em São Paulo, apesar da referência estável no fechamento desta quinta-feira (29/11), algumas indústrias conseguiram alongar as escalas de abate nos últimos dias, e com isso ofertam R$1,00/@ a menos.\r\n\r\nPorém, existe ainda oferta R$1,50/@ acima da referência.\r\n\r\nNo Mato Grosso do Sul, as tentativas de compra a R$92,00/@, à vista, têm ganhado força. Em Rondônia o mercado recuou R$2,00/@, reflexo das compras abaixo da referência.\r\n\r\nNo mercado atacadista de carne bovina, os preços ficaram estáveis, mas a pressão de baixa é grande.\r\n', '2012042916309414a8f5b810972c3c9a0e2860c07532.jpg', '2012-04-29', 'http://www.portaldoagronegocio.com.br/conteudo.php?tit=boa_oferta_e_demanda_fraca_colaboram_para_a_baixa_do_boi&id=85346', 'N', 2),
(4, 'Chineses conhecem operação de grãos no Porto de Paranaguá', 'Uma comitiva do município de Ningbo, na China, esteve no Porto de Paranaguá, nesta sexta-feira (30).', 'Uma comitiva do município de Ningbo, na China, esteve no Porto de Paranaguá, nesta sexta-feira (30). Representando o Escritório Municipal de Grãos, eles foram recebidos pelo superintendente da Administração dos Portos de Paranaguá e Antonina (Appa), Luiz Henrique Dividino. O principal interesse do grupo era a operação de grãos do Corredor de Exportação do porto paranaense.\r\n\r\nSegundo o secretário chinês, Du Jun Bao, saber como o Porto de Paranaguá movimenta principalmente o soja interessa porque grande parte do volume desses grãos que chegam ao porto de Ningbo saem do porto paranaense. “Precisávamos ver com os próprios olhos para, no futuro, poder estabelecer parcerias ainda mais sólidas”, afirma.\r\n\r\nLocalizada na província de Zhejiang (segundo Du Jun Bao, província irmã do Estado do Paraná), Ningbo é uma cidade portuária. Como explica o secretário do Escritório Municipal de Grãos, os principais produtos operados por lá são os minérios da Austrália e os cereais – soja e milho – do Brasil. Anualmente, esse porto chinês chega a movimentar 500 milhões de toneladas de cargas. “O nosso porto, como o Porto de Paranaguá, é de múltiplo uso e está em fase de expansão e modernização. Com essa visita, nós também queremos aprender com as boas ideias para aplicar lá”, esclarece.\r\n\r\nO que mais impressionou os chineses, no Porto de Paranaguá, foi o Corredor de Exportação. “É muito interessante ver como é possível nove terminais operarem simultaneamente. Mais interessante ainda é ver como a parceria público/ privada tem dado bons resultados ao escoamento de grãos”, conclui Bao.\r\n\r\nNetworking – A China é tanto o principal mercado de exportação dos grãos quanto de importação da indústria leve (de produtos como plásticos, eletrônicos e roupas em contêineres) no Porto de Paranaguá.\r\n\r\n“A cada ano que passa, a China amplia a posição de potência que ocupa no mercado internacional. São grandes importadores e também exportadores. O porto de Ningbo, por exemplo, chega a movimentar 500 milhões de toneladas por ano. Portanto, também temos muito que aprender com eles. Essa troca de experiências e informações, essa abertura a novas parcerias, negócios e diálogo – uma determinação do governador Beto Richa -, é o que faz o horizonte do Porto de Paranaguá expandir ainda mais”, garante o superintendente da Appa.\r\n\r\nDe janeiro até outubro deste ano, o Porto de Paranaguá movimentou quase 38 milhões de toneladas de cargas. Dessas, segundo dados do Ministério de Desenvolvimento, Indústria e Comércio Exterior (MDIC), 6,2 milhões foram exportadas para a China – gerando receita de quase U$ 3,8 bilhões. Somente de soja, foram 5,2 milhões de toneladas exportadas para aquele país, somando U$ 2,7 bilhões em receita cambial.\r\n\r\nAlém do soja, o açúcar e os congelados também se destacam na exportação do Porto de Paranaguá, com destino à China. De açúcar, este ano de janeiro a outubro, segundo o MDIC, foram 214 mil toneladas, o que gerou U$111 milhões. De congelados, foram 94 mil toneladas – principalmente de miudezas de frango – gerando receita de U$ 204 milhões.\r\n\r\nEste ano, o Porto de Paranaguá importou 867 mil toneladas (um total de U$2,2 bilhões) de produtos de origem chinesa. ', '2012042916389414a8f5b810972c3c9a0e2860c07532.jpg', '2012-04-29', 'Imprensa Portos', 'S', 2),
(5, 'sdsdsdsds', 'dsdsds', 'dsdsd', 'sdsds', '2013-01-25', 'http://www.portaldoagronegocio.com.br/conteudo.php?tit=pib_brasileiro_registra_crescimento_de_0,6_no_3_trimestre&id=85348', 'N', 5),
(6, 'sdsdsdsds', 'dsdsds', 'dsdsd', 'sdsds', '2013-01-25', 'http://www.portaldoagronegocio.com.br/conteudo.php?tit=pib_brasileiro_registra_crescimento_de_0,6_no_3_trimestre&id=85348', 'N', 4),
(7, 'sdsdsdsds', 'dsdsds', 'dsdsd', 'sdsds', '2013-01-25', 'http://www.portaldoagronegocio.com.br/conteudo.php?tit=pib_brasileiro_registra_crescimento_de_0,6_no_3_trimestre&id=85348', 'N', 4),
(8, 'sdsdsdsds', 'dsdsds', 'dsdsd', 'sdsds', '2013-01-25', 'http://www.portaldoagronegocio.com.br/conteudo.php?tit=pib_brasileiro_registra_crescimento_de_0,6_no_3_trimestre&id=85348', 'N', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_noticia_mais_lida`
--

CREATE TABLE IF NOT EXISTS `site_noticia_mais_lida` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noticia_id` int(11) NOT NULL,
  `click` int(11) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_noticia_mais_lida` (`noticia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `site_noticia_mais_lida`
--

INSERT INTO `site_noticia_mais_lida` (`id`, `noticia_id`, `click`, `titulo`) VALUES
(10, 1, 1, 'PIB brasileiro registra crescimento de 0,6% no 3º trimestre'),
(11, 1, 2, 'PIB brasileiro registra crescimento de 0,6% no 3º trimestre'),
(12, 1, 3, 'PIB brasileiro registra crescimento de 0,6% no 3º trimestre'),
(13, 1, 4, 'PIB brasileiro registra crescimento de 0,6% no 3º trimestre'),
(14, 1, 5, 'PIB brasileiro registra crescimento de 0,6% no 3º trimestre');

--
-- Gatilhos `site_noticia_mais_lida`
--
DROP TRIGGER IF EXISTS `gera_click`;
DELIMITER //
CREATE TRIGGER `gera_click` BEFORE INSERT ON `site_noticia_mais_lida`
 FOR EACH ROW begin
declare newclick int; 
	select 
		count(click) into newclick 
	from site_noticia_mais_lida 
	where noticia_id = new.noticia_id order by click desc limit 1;
	if  newclick > 0 then
       set new.click = newclick +1 ;
     else
       set new.click = 1;
     end if;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_parceiros`
--

CREATE TABLE IF NOT EXISTS `site_parceiros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parceiro` varchar(150) DEFAULT NULL,
  `atividade` text,
  `historico` text,
  `foto` text,
  `data_inc` date DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `site_parceiros`
--

INSERT INTO `site_parceiros` (`id`, `parceiro`, `atividade`, `historico`, `foto`, `data_inc`, `email`, `ativo`) VALUES
(1, 'Pax vida', 'Funerária', 'Funerária Pax vida a masi de 10 anos atendendo a paupalação de coxim e região<br>', '2012012222194e9cff061ed0bca5cb59bbe7b534da9a.jpg', '2012-01-22', 'axel_nomore@hotmail.com', 'S'),
(2, 'sasas', 'asas', '<b><font face="Georgia">asasasas</font></b><div><font face="Georgia"><br></font></div><div><font face="Georgia">wqwqqwqqwqqqwqqqwqwqwqqwqwqwqwqwqqwqwqwqwqwqw</font></div>', '201208041803c774d1a316ed36ede99368eb2ba4f26d.jpg', '2012-08-04', 'axel_nomore@hotmail.com', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_portifolio`
--

CREATE TABLE IF NOT EXISTS `site_portifolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(170) NOT NULL,
  `url` varchar(200) NOT NULL,
  `data_desenv` date NOT NULL,
  `descricao` text NOT NULL,
  `img` text NOT NULL,
  `ativo` char(2) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `site_portifolio`
--

INSERT INTO `site_portifolio` (`id`, `nome`, `url`, `data_desenv`, `descricao`, `img`, `ativo`) VALUES
(1, 'Djdidi', 'http://www.dididjmix.com/', '2012-10-28', '        Site do Dj didi de ponta porã MS', '2012012920380c9be29fae3ea7b97f428266efef18c1.jpg', 'S'),
(2, 'PSG Tecnologia Aplicada', 'http://www.psgtecnologiaaplicada.com.br/', '2012-10-28', 'PSG Tecnologia Aplicada, Empresa de desenvolvimento de software e Recursos Humanos&nbsp;', '2012012221020991728e5ed143f0c69e88a40c9339ac.jpg', 'N'),
(3, 'Axel Alexander', 'http://www.axelalexander.webcindario.com', '2012-10-28', '                site próprio para divulgação de seriços e software<span class="Apple-tab-span" style="white-space:pre">		</span>', '201210281357d1e7fa96c85bd4343d4d0f5f5ee630ba.jpg', 'N'),
(4, 'Syscontrole', 'http://axeldeveloper.atspace.eu', '2012-10-28', 'Sistema para controle pessoal e financeiro, possue também um ampla adiministração de cliente e funciuonarios produtos e categorias.<div>exlusivos de clientes        </div>', 'semfoto.jpg', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_post`
--

CREATE TABLE IF NOT EXISTS `site_post` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(70) DEFAULT NULL,
  `texto` text,
  `foto` text,
  `data_pub` date DEFAULT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'N',
  `fonte` varchar(70) DEFAULT NULL,
  `post_categoria_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Fk_categoria_post` (`post_categoria_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tablea que contem os  post divulgado na internet' AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `site_post`
--

INSERT INTO `site_post` (`id`, `titulo`, `texto`, `foto`, `data_pub`, `ativo`, `fonte`, `post_categoria_id`) VALUES
(1, 'Codignite um excelente framekword PHP', 'Codigniter e um excelente framekword para Desenvolvimento de aplicações em PHP\r\nO CodeIgniter é uma estrutura livre de aplicativos da Web escrita em PHP. Ela pode ser utilizada com muitos aplicativos de bancos de dados, incluindo MySQL, DB2® Express-C e outros. A estrutura usa o padrão de design MVC, cujo objetivo primário é separar os dados e as camadas de apresentação de um  aplicativo de software. \r\nNo padrão Model-View-Controller (MVC), o modelo gerencia a camada de dados,\r\ncomunicando-se com o banco de dados; a visualização gerencia a camada de apresentação, exibindo a UI ne o conteúdo; e o controlador gerencia a comunicação entre as visualizações e os modelos.', '20120131203328fbec90d11d041cc9b74cf3128b6622.jpg', '2010-12-05', 'S', 'Axel Alexander', 1),
(2, 'Oracle Linux Enterpise 10g', '<b>Oracle Linux Enterpise</b><span style="font-weight: normal; "> vaseado no red hat porem com otima performance com o banco de dados oracle desenvolvida peal oracle corporation        </span>        ', '2012012321393bc4d3619b067e250dea1526aea34bbb.jpg', '2012-07-29', 'S', 'http://localhost/axelalexander/', 2),
(3, 'vamos ver se funciona agora ', '<span style="color: rgb(68, 68, 68); font-size: 12px; background-color: rgb(255, 255, 255); "><font face="Arial">he consultado y me dicen q con el dreamweaver no puedo accesar a una base de datos en el servidor en tiempo de diseño...la pregunta es...como es el desarrollo entonces con el dream? estoy obligado a hacerlo en local y solo cuando este todo probado subirlo? es asi o me busco otro servidor?</font></span>', '2012071820319eb4a7799ceb581c7fcbd2eaeb6d263d.jpg', '2012-07-18', 'S', 'http://www.forosdelweb.com/f17/conexion-mysql-webcindario-com-224041/', 3),
(4, 'C# entity framework', 'microssoft libera os fontes do entity framework', '201207291849d1e7fa96c85bd4343d4d0f5f5ee630ba.jpg', '0000-00-00', 'S', 'fonte', 7),
(7, 'fdfdfdf', 'dfdfdfd', '201207291906b3aca7402a122226beb6f0819a3d86cf.jpg', '2012-07-29', 'S', 'fdfdfdfdf', 2),
(8, 'testando o ckl edito', '<b>ecklEditor e uma merda e não funiona direito no internet explorer</b><div>mas no cromo funciona kkkk&nbsp;</div><div><ul><li><span style="font-size: 10pt; ">qqqq</span></li><li><span style="font-size: 10pt; ">rrrrrrr</span></li><li><span style="font-size: 10pt; ">aaaa</span></li><li><span style="font-size: 10pt; ">eeee</span></li></ul></div>', '201207291926d1e7fa96c85bd4343d4d0f5f5ee630ba.jpg', '2012-07-29', 'N', 'dsdsdsdsdsds', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_texto`
--

CREATE TABLE IF NOT EXISTS `site_texto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rotulo` varchar(20) NOT NULL,
  `titulo` text NOT NULL,
  `comentario` text NOT NULL,
  `ativo` char(2) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `site_texto`
--

INSERT INTO `site_texto` (`id`, `rotulo`, `titulo`, `comentario`, `ativo`) VALUES
(1, 'agronegócio', 'O que é?', 'O Conceito\r\nO conceito de "agribusiness" foi proposto pela primeira vez em 1957, por Davis e Goldberg, como a soma das operações de produção e distribuição de suprimentos agrícolas, processamentos e distribuição dos produtos agrícolas  e itens produzidos a partir deles.\r\n\r\nAssim, de acordo com o conceito de agronegócio, a agricultura passa a ser abordada de maneira associada aos outros agentes responsáveis  por todas as atividades, que garantem a produção, transformação, distribuição e consumo de alimentos, considerando assim, a agricultura como parte  de uma extensa rede de agentes ecômicos.\r\n\r\nCom este conceito formalizado por tais autores, a visão sistêmica passa a ganhar  importância, abrangendo todos os envolvidos, desde a pesquisa até o cosumidor final, desde o que comumente se chama "antes da porteira" até "pós-porteira".\r\n\r\nAs exportações do agronegócio em 2007, segundo dados do Ministério da Agricultura, Pecuária e Abastecimento, totalizaram US$ 58,415 bilhões, um recorde histórico para o setor. Em relação a 2006, as exportações apresentaram um aumento de US$ 8,992 bilhões, o que significou uma taxa de crescimento de 18,2%. \r\n\r\nCom isso, as exportações do agronegócio corresponderam a 36,4% das exportações totais brasileiras no período, que foram de US$ 160 bilhões. As importações apresentaram variação anual de 30,2%, totalizando US$ 8,719 bilhões.\r\nComo conseqüência, registrou-se um superávit da balança comercial do agronegócio de US$ 49,696 bilhões, também um recorde histórico, que automaticamente repercute no saldo brasileiro como um todo, já que em 2006 o agronegócio teve a participação de 35,9%, subindo para 36,4% em 2007, apresentando queda de participação nas importações totais de 7,3 para 7,2%.\r\n\r\nO Mercado\r\nO agronegócio é fundamental para a economia do país, pois representa cerca de um terço do nosso PIB e tem dado grande contribuição às exportações de commodities e produtos agro-industriais. O Brasil caminha para se tornar uma liderança mundial no agronegócio e para consolidar nessa atividade é preciso ampliar sua competência para atuar de modo eficiente no controle das cadeias de produção agropecuária de modo a garantir qualidade e segurança dos produtos e das cadeias de produção. Já exportamos hoje para 180 países. Podemos conquistar novos mercados, mas para isto precisamos alcançar padrões elevados de certificação e qualidade sanitária e fitossanitária, mantendo assim elevada competitividade no mercado internacional com melhor enfrentamento das exigências e barreiras como afirmado recentemente pelo presidente Luis Inácio Lula da Silva "investir em sanidade é na verdade proteger o patrimônio nacional e por isso colocamos a sanidade animal e vegetal entre as prioridades deste mandato". \r\nO Brasil ainda enfrenta situações oriundas da imposição de barreiras sanitárias e fitossanitárias que precisam ser superadas. Além disso, está sob ameaça constante do avanço e severidade de pragas e doenças de plantas e animais já existentes no país e daquelas quarentenárias que podem ser introduzidas no país a qualquer momento se medidas preventivas competentes e eficazes não forem delineadas e implementadas pelo poder público e pelo setor produtivo.\r\n \r\nA missão institucional do Ministério da Agricultura, Pecuária e Abastecimento (MAPA) é promover o desenvolvimento sustentável e a competitividade do agronegócio em benefício da sociedade brasileira. No cumprimento de sua missão, o MAPA formula e executa políticas para o desenvolvimento do agronegócio, integrando aspectos mercadológicos, tecnológicos, científicos, organizacionais e ambientais, na busca do atendimento às exigências dos consumidores brasileiros e do mercado internacional.\r\n \r\nAs medidas adotadas pela Secretaria de Defesa Agropecuária-SDA do MAPA fundamentam-se na técnica, na ciência e na legislação em vigor, conforme preconizam os Acordos de Medidas Sanitárias e Fitossanitárias e de Obstáculos Técnicos ao Comércio da OMC.', 'S'),
(2, 'agroenergia', 'O que é agroenergia?', 'Marília Weigert Ennes \r\n\r\nO Brasil tem tudo para ocupar um papel neste segmento. \r\n\r\nO esforço mundial e brasileiro na busca de suprir as demandas energéticas com base em processos mais sustentáveis do ponto de vista econômico, social e ambiental revela um importante espaço para o desenvolvimento da agroenergia. \r\n\r\nA agroenergia trata do conjunto de produtos derivados da biomassa – produzidos ou liberados pela atividade humana ou animal - que podem ser transformados em fontes energéticas para usos humanos distintos – eletricidade, calor e transporte. \r\n\r\nO Brasil por suas características de país tropical e extenso território apresenta condições inigualáveis para ocupar um importante papel no mundo contemporâneo neste segmento. \r\n\r\nA energia é um dos vetores determinantes para o desenvolvimento no mundo contemporâneo. O crescimento populacional e as atividades econômicas demandam de forma contínua e crescente energia para responder as necessidades da vida humana tal qual a vemos hoje. \r\n\r\nO suprimento de energia primária varia entre os blocos econômicos e está diretamente correlacionado ao grau de desenvolvimento econômico dos países que os integram. Nos países com processos econômicos mais consolidados, a demanda energética por habitante é mais elevada do que em países com economias em fase de consolidação ou em desenvolvimento. \r\n\r\nA\r\nsociedade\r\ncontemporânea estabeleceu o seu desenvolvimento econômico baseado na utilização intensiva de fontes energéticas de origem fóssil e hoje se defronta com a necessidade de alterar substancialmente a matriz energética em intensificando o investimento e o uso em de energia a partir de fontes alternativas, preferencialmente renováveis, e sustentáveis do ponto vista social, econômico e ambiental. \r\n\r\nO crescente aumento do preço do petróleo, a possível instabilidade de suprimento dado que as maiores reservas estão em áreas de conflito, o risco das alterações climáticas derivadas da liberação excessiva de gases de efeito estufa pelo elevado consumo de combustíveis fósseis, recomendam a busca de alternativas energéticas menos poluentes e com perspectivas de renovação continuada. \r\n\r\nAssim, são estabelecidos tratados entre as nações, atos sem precedentes na história da humanidade, manifestados de maneira formal por um acordo entre 175 países com a assinatura da Convenção-Quadro das Nações Unidas sobre Mudança do Clima e mais recentemente com a assinatura e o compromisso firmado com o Protocolo de Quioto. \r\n\r\nO Brasil é signatário do Protocolo de Quioto, e mesmo não tendo a obrigatoriedade, até o momento, com metas de redução de gases de efeito estufa (GEE), assumiu o compromisso de partilhar do esforço mundial para reduzir suas emissões domésticas. \r\n\r\nNesse sentido, apresenta vantagens comparativas aos demais países em função de clima e disponibilidade de área para massificar os\r\ninvestimentos\r\nna produção agrícola de suporte à agroenergia sem necessariamente afetar a segurança alimentar. \r\n\r\nComo uma das medidas de apoio para mitigar os efeitos dos gases estufa lançou o Plano Nacional de Agroenergia para o período de 2006 a 2011 que visa estabelecer marco e rumo para as ações públicas e privadas de geração de conhecimento e de tecnologias que contribuam para a produção sustentável da agricultura de energia e para o uso racional dessa energia renovável. \r\n\r\nTem por meta tornar competitivo o agronegócio brasileiro e dar suporte a determinadas políticas públicas, como a inclusão social, a regionalização do desenvolvimento e a sustentabilidade ambiental.\r\n\r\n(Sebrae Nacional) ', 'N');

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_vagas_empregos`
--

CREATE TABLE IF NOT EXISTS `site_vagas_empregos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `vaga` text NOT NULL,
  `descricao` text NOT NULL,
  `beneficio` text NOT NULL,
  `exigencia` text NOT NULL,
  `faixa_salarial` decimal(17,2) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `data` date NOT NULL,
  `data_atualizacao` date DEFAULT NULL,
  `fonte` varchar(70) NOT NULL,
  `ativo` char(2) NOT NULL DEFAULT 'N',
  `categoria_vaga_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Fk_categoria_vaga` (`categoria_vaga_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tabela que contem as vagas a serem divulgado no site' AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `site_vagas_empregos`
--

INSERT INTO `site_vagas_empregos` (`id`, `codigo`, `vaga`, `descricao`, `beneficio`, `exigencia`, `faixa_salarial`, `cidade`, `data`, `data_atualizacao`, `fonte`, `ativo`, `categoria_vaga_id`) VALUES
(1, 125, 'Analista de Sistemas', 'sistemas de controle e gestâo, sobre medidas', 'sdsdsds', 'dsdsdsds', '1500.00', 'Campo Grande', '2012-11-16', '2012-11-16', 'sasa', 'N', 1),
(2, 126, 'Desenvolvedor web ', 'De R$ 1.001,00 a R$ 2.000,00 Websites dinamicos, layout bem padronizados', 'Realizar programação, a partir das especificações de processos e fluxo de dados. Fazer os testes preliminares das aplicações desenvolvidas e atuar com manutenção aos sistemas já implantados.\r\nExperiência em desenvolvimento C ou C++, Visual Studio e banco de dados, preferencialmente SQL Server.\r\nEnsino Superior cursando em áreas ligadas à Tecnologia da Informação.\r\n\r\n', 'Assistência Médica / Medicina em grupo, Tíquete-alimentação', '1500.00', 'São Paulo', '2012-11-14', '2012-11-14', 'Catho Online - Empregos ', 'N', 2),
(4, 127, 'sasas', 'asas', 'asasa', 'asa', '500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2),
(5, 127, 'sasas', 'asas', 'asasa', 'asa', '1500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2),
(6, 127, 'sasas', 'asas', 'asasa', 'asa', '1500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2),
(7, 127, 'sasas', 'asas', 'asasa', 'asa', '1500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2),
(8, 127, 'sasas', 'asas', 'asasa', 'asa', '1500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2),
(9, 127, 'sasas', 'asas', 'asasa', 'asa', '1500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2),
(10, 127, 'sasas', 'asas', 'asasa', 'asa', '1500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2),
(11, 127, 'sasas', 'asas', 'asasa', 'asa', '1500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2),
(12, 127, 'sasas', 'asas', 'asasa', 'asa', '1500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2),
(13, 127, 'sasas', 'asas', 'asasa', 'asa', '1500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2),
(14, 127, 'sasas', 'asas', 'asasa', 'asa', '1500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2),
(15, 127, 'sasas', 'asas', 'asasa', 'asa', '1500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2),
(16, 127, 'sasas', 'asas', 'asasa', 'asa', '1500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2),
(17, 127, 'sasas', 'asas', 'asasa', 'asa', '1500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2),
(18, 127, 'sasas', 'asas', 'asasa', 'asa', '1500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2),
(19, 127, 'sasas', 'asas', 'asasa', 'asa', '1500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2),
(20, 127, 'sasas', 'asas', 'asasa', 'asa', '1500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2),
(21, 127, 'sasas', 'asas', 'asasa', 'asa', '1500.00', 'Campo Grande', '2012-11-27', '2012-11-27', 'sasa', 'N', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `role`, `date_created`) VALUES
(1, 'axel', 'eb7da2365c1e4c6920704868072bb0f24c88cc3f', '6804a56d7db90ccad4bdb3df4bf2f390a265aa12', 'Administrador', '2012-09-01 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(10) NOT NULL,
  `login` varchar(10) NOT NULL,
  `nivelUsuario_id` int(11) NOT NULL,
  `data_nascimento` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nivelUsuario_id` (`nivelUsuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `login`, `nivelUsuario_id`, `data_nascimento`) VALUES
(1, 'Axel ', 'axel_nomore@hotmail.com', 'axelmarker', 'axel', 2, '1985-10-10'),
(3, 'sulma esteche 45', 'sulma@hotmail.com', 'admin12', 'admin12', 2, '1995-10-11');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `reg_pessoas_profissional`
--
ALTER TABLE `reg_pessoas_profissional`
  ADD CONSTRAINT `Fk_Reg_pessoas` FOREIGN KEY (`reg_pessoa_id`) REFERENCES `reg_pessoas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `site_noticias`
--
ALTER TABLE `site_noticias`
  ADD CONSTRAINT `fk_categoria_noticia` FOREIGN KEY (`categoria_noticia_id`) REFERENCES `site_categoria_noticias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `site_noticia_mais_lida`
--
ALTER TABLE `site_noticia_mais_lida`
  ADD CONSTRAINT `fk_noticia_mais_lida` FOREIGN KEY (`noticia_id`) REFERENCES `site_noticias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `site_post`
--
ALTER TABLE `site_post`
  ADD CONSTRAINT `Fk_categoria_post` FOREIGN KEY (`post_categoria_id`) REFERENCES `site_categoria_post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `site_vagas_empregos`
--
ALTER TABLE `site_vagas_empregos`
  ADD CONSTRAINT `Fk_categoria_vaga` FOREIGN KEY (`categoria_vaga_id`) REFERENCES `site_categoria_vaga` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_fk` FOREIGN KEY (`nivelUsuario_id`) REFERENCES `nivel_usuario` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
