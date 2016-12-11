CREATE TABLE `slaptas_klausimas` (
  `slaptas_klausimas_id` int(5) NOT NULL,
  `klausimas` varchar(40) NOT NULL,
  `sumurimo_data` date NOT NULL,
  `busena` int(2) NOT NULL,
   CONSTRAINT pk_slaptas_klausimas PRIMARY KEY (`slaptas_klausimas_id`)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `nuolaidu_kuponas` (
  `nuolaidu_kuponas_id` int(5) NOT NULL,
  `kodas` varchar(40) NOT NULL,
  `sumurimo_data` date NOT NULL,
  `galioja_nuo` date NOT NULL,
  `galioja_iki` date NOT NULL,
   CONSTRAINT pk_nuolaidu_kuponas PRIMARY KEY (`nuolaidu_kuponas_id`)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `klientas` (
  `klientas_id` int(5) NOT NULL,
  `slaptas_klausimas_id` int(11),
  `slaptas_atsakymas` varchar(20),
  `vardas` varchar(20) NOT NULL,
  `pavarde` varchar(20) NOT NULL,
  `slaptazodis` varchar(20) NOT NULL,
  `el_pastas` varchar(40) NOT NULL,
  `telefonas` int(20) NOT NULL,
  `salis` varchar(11),
  `miestas` varchar(20),
  `adresas` varchar(40),
  `pasto_kodas` varchar(10),
  `rajonas` varchar(10),
  `namo_nr` int(3),
  `registracijos_data` date NOT NULL,
  `lygis` int(2) NOT NULL,
  `pakvietimo_kodas` varchar(20) NOT NULL,
   CONSTRAINT pk_klientas PRIMARY KEY (`klientas_id`),
   CONSTRAINT fk_klientas_slaptas_klausimas_id FOREIGN KEY (`slaptas_klausimas_id`) REFERENCES slaptas_klausimas(`slaptas_klausimas_id`)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `pakvietimas` (
  `pakvietimas_id` int(5) NOT NULL,
  `el_pastas` varchar(40) NOT NULL,
  `sumurimo_data` date NOT NULL,
  `busena` int(2) NOT NULL,
  `klientas_id` int(5) NOT NULL,
   CONSTRAINT pk_pakvietimas PRIMARY KEY (`pakvietimas_id`),
   CONSTRAINT fk_pakvietimas_klientas_id FOREIGN KEY (`klientas_id`) REFERENCES klientas(`klientas_id`)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `reputacija` (
  `reputacija_id` int(5) NOT NULL,
  `komentaras` varchar(40) NOT NULL,
  `sumurimo_data` date NOT NULL,
  `busena` int(2) NOT NULL,
  `klientas_id` int(5) NOT NULL,
   CONSTRAINT pk_reputacija PRIMARY KEY (`reputacija_id`),
   CONSTRAINT fk_reputacija_klientas_id FOREIGN KEY (`klientas_id`) REFERENCES klientas(`klientas_id`)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

