#create table

--
-- Table structure for table `dataset`
--

CREATE TABLE IF NOT EXISTS `dataset` (
  `dataset_id` varchar(20) NOT NULL,
  `dataset_name` varchar(255) NOT NULL,
  `medic_record` varchar(255) NOT NULL,
  `status` varchar(10) NULL,
  `created_date` date NOT NULL,
  PRIMARY KEY (`dataset_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `image_data`
--

CREATE TABLE IF NOT EXISTS `image_data` (
  `file_name` varchar(255) NOT NULL,
  `dataset_id` varchar(20) NOT NULL,
  `validate` varchar(11) NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `file_path` varchar(255) NOT NULL,
  PRIMARY KEY (`file_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataset`
--

--
-- Dumping data for table `image_data`
--