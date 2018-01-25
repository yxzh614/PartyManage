-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-01-16 05:24:00
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dj`
--
-- 党建管理系统
-- by 李泽伟 岳贤哲 好增运 包建 周琦 刘莹 of shenyangligong
-- --------------------------------------------------------

--
-- 表的结构 `activist`
--

CREATE TABLE `activist` (
  `ID_number` char(18) NOT NULL COMMENT '身份证号',
  `GZRX_date` date DEFAULT NULL COMMENT '高中入学日期（学生）',
  `GZBY_date` date DEFAULT NULL COMMENT '高中毕业日期（学生）',
  `trainer1_ID` char(18) DEFAULT NULL COMMENT '培养人1ID',
  `togetherwork_day1` smallint(6) DEFAULT NULL COMMENT '培养人1与被培养人一起工作的时间',
  `trainer2_ID` char(18) DEFAULT NULL COMMENT '培养人2ID',
  `togetherwork_day2` smallint(6) DEFAULT NULL COMMENT '培养人2与被培养人一起工作的时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `activist`
--

INSERT INTO `activist` (`ID_number`, `GZRX_date`, `GZBY_date`, `trainer1_ID`, `togetherwork_day1`, `trainer2_ID`, `togetherwork_day2`) VALUES
('21010619970322331X', '0000-01-01', '0000-01-01', NULL, NULL, NULL, NULL),
('334444666666667777', '0000-01-01', '0000-01-01', NULL, NULL, NULL, NULL),
('334569874523442344', '0000-01-01', '0000-01-01', NULL, NULL, NULL, NULL),
('223344199703223312', '0000-01-01', '0000-01-01', NULL, NULL, NULL, NULL),
('33223319970322331X', '0000-01-01', '0000-01-01', NULL, NULL, NULL, NULL),
('432456199703223333', '0000-01-01', '0000-01-01', NULL, NULL, NULL, NULL),
('246345199703223333', '0000-01-01', '0000-01-01', NULL, NULL, NULL, NULL),
('134134199703223311', '0000-01-01', '0000-01-01', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `activity`
--

CREATE TABLE `activity` (
  `Activity_ID` int(11) NOT NULL COMMENT '活动ID',
  `Datetime` datetime DEFAULT NULL COMMENT '日期时间',
  `site` varchar(255) DEFAULT NULL COMMENT '地点',
  `Department_ID` char(9) DEFAULT NULL COMMENT '召集部门ID',
  `join_depart` varchar(255) DEFAULT NULL COMMENT '参与部门ID（部门ID用半角分号分开）',
  `activity_theme` varchar(255) DEFAULT NULL COMMENT '活动主题',
  `activity_content` varchar(255) DEFAULT NULL COMMENT '活动内容',
  `othert_member` varchar(255) DEFAULT NULL COMMENT '其他出席人员（人名用全角分号分开）',
  `photo` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '照片'
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- --------------------------------------------------------

--
-- 表的结构 `appearance`
--

CREATE TABLE `appearance` (
  `Activity_ID` int(11) NOT NULL COMMENT '活动ID',
  `ID_number` char(18) NOT NULL COMMENT '参加人员身份证号'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `appraisement`
--

CREATE TABLE `appraisement` (
  `appraisement_id` int(10) NOT NULL,
  `ID_number` char(18) NOT NULL COMMENT '身份证号',
  `PY_time` date DEFAULT NULL COMMENT '评议时间',
  `PY_result` varchar(255) DEFAULT NULL COMMENT '评议结果',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `arrears`
--

CREATE TABLE `arrears` (
  `arrears_id` int(10) NOT NULL,
  `ID_number` char(18) NOT NULL COMMENT '身份证号',
  `QJ_money` decimal(5,2) DEFAULT NULL COMMENT '欠缴金额',
  `QJ_starttime` date DEFAULT NULL COMMENT '欠缴起始时间',
  `QJ_endtime` date DEFAULT NULL COMMENT '欠缴结束时间',
  `QJ_reason` varchar(255) DEFAULT NULL COMMENT '欠缴原因',
  `hand_advise` varchar(255) DEFAULT NULL COMMENT '处理意见',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `attend`
--

CREATE TABLE `attend` (
  `conference_ID` int(11) NOT NULL COMMENT '会议ID',
  `ID_number` char(18) NOT NULL COMMENT '身份证号'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `conference`
--

CREATE TABLE `conference` (
  `conference_ID` int(11) NOT NULL COMMENT '会议ID',
  `Datetime` datetime DEFAULT NULL COMMENT '日期时间',
  `site` varchar(255) DEFAULT NULL COMMENT '地点',
  `Department_ID` char(9) DEFAULT NULL COMMENT '召集部门ID',
  `conference_type` tinyint(4) DEFAULT NULL COMMENT '会议类型',
  `meeting_theme` varchar(255) DEFAULT NULL COMMENT '会议主题',
  `meeting_detail` varchar(255) DEFAULT NULL COMMENT '会议内容',
  `else_member` varchar(255) DEFAULT NULL COMMENT '其他出席人员（人名用全角分号分开）',
  `photo` varchar(255) DEFAULT NULL COMMENT '照片'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `conference`
--

INSERT INTO `conference` (`conference_ID`, `Datetime`, `site`, `Department_ID`, `conference_type`, `meeting_theme`, `meeting_detail`, `else_member`, `photo`) VALUES
(1, '2017-07-25 00:00:00', NULL, '000000000', NULL, '无', '无', '无', '无');

-- --------------------------------------------------------

--
-- 表的结构 `conference_type_bmb`
--

CREATE TABLE `conference_type_bmb` (
  `conference_type` tinyint(4) NOT NULL,
  `conference_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `conference_type_bmb`
--

INSERT INTO `conference_type_bmb` (`conference_type`, `conference_type_name`) VALUES
(1, '党课'),
(11, '民主生活会'),
(12, '党委会'),
(13, '中心组会'),
(14, '全体党员大会'),
(21, '组织生活会'),
(22, '支部委员会'),
(23, '支部党员大会'),
(31, '党小组会');

-- --------------------------------------------------------

--
-- 表的结构 `confirmationletter`
--

CREATE TABLE `confirmationletter` (
  `ID` int(11) NOT NULL,
  `ID_number` varchar(18) NOT NULL COMMENT '身份证号',
  `QS_organization` varchar(255) DEFAULT NULL COMMENT '亲属所在党组织',
  `QS_name` varchar(10) DEFAULT NULL COMMENT '亲属姓名',
  `QS_profession` varchar(255) DEFAULT NULL COMMENT '亲属职业',
  `QS_politics` varchar(255) DEFAULT NULL COMMENT '亲属政治面貌',
  `relative` varchar(255) DEFAULT NULL COMMENT '与本人关系',
  `FC_time` datetime DEFAULT NULL COMMENT '发出时间',
  `FH_time` datetime DEFAULT NULL COMMENT '返回时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `confirmationletter`
--

INSERT INTO `confirmationletter` (`ID`, `ID_number`, `QS_organization`, `QS_name`, `QS_profession`, `QS_politics`, `relative`, `FC_time`, `FH_time`) VALUES
(1, '21010619970322331X', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '334444666666667777', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '334569874523442344', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '223344199703223312', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '432456199703223333', '1', '1', '1', '1', '1', '2017-07-01 00:00:00', '2017-07-14 00:00:00'),
(9, '246345199703223333', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '134134199703223311', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '432456199703223333', '2', '2', '2', '2', '2', '2018-01-04 00:00:00', '2018-01-12 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `degree_bmb`
--

CREATE TABLE `degree_bmb` (
  `degree` tinyint(4) NOT NULL,
  `degree_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `degree_bmb`
--

INSERT INTO `degree_bmb` (`degree`, `degree_name`) VALUES
(1, '博士'),
(2, '硕士'),
(3, '研究生'),
(0, '无');

-- --------------------------------------------------------

--
-- 表的结构 `department_id_bmb`
--

CREATE TABLE `department_id_bmb` (
  `Department_ID` char(9) NOT NULL,
  `Department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `department_id_bmb`
--

INSERT INTO `department_id_bmb` (`Department_ID`, `Department`) VALUES
('00C000100', '学生第一党支部'),
('00C000200', '学生第二党支部'),
('00C000300', '学生第三党支部'),
('00C000400', '学生第四党支部'),
('00C000500', '教工第一党支部'),
('00C000600', '教工第二党支部'),
('00C000700', '教工第三党支部'),
('00C000800', '研究生第一党支部'),
('00C000900', '建筑学院第一党支部'),
('000000000', '无');

-- --------------------------------------------------------

--
-- 表的结构 `docu_type_bmb`
--

CREATE TABLE `docu_type_bmb` (
  `docu_type` tinyint(4) NOT NULL,
  `docu_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `docu_type_bmb`
--

INSERT INTO `docu_type_bmb` (`docu_type`, `docu_type_name`) VALUES
(1, '入党志愿书'),
(2, '入党申请书'),
(3, '自传'),
(4, '入党积极分子培养考察表'),
(5, '优秀团员作党的发展对象推荐表'),
(6, '群众谈话记录'),
(7, '党支部综合性政审材料'),
(8, '函调信'),
(9, '公示材料'),
(10, '转正申请'),
(11, '预备党员考察表'),
(12, '入党积极分子培训结业证'),
(13, '入党前短期集中培训合格证'),
(14, '思想汇报');

-- --------------------------------------------------------

--
-- 表的结构 `duty`
--

CREATE TABLE `duty` (
  `Department_ID` char(9) NOT NULL COMMENT '组织机构ID',
  `job_name` tinyint(4) DEFAULT NULL COMMENT '职务名称',
  `ID_number` char(18) NOT NULL COMMENT '身份证号',
  `state` tinyint(4) DEFAULT NULL COMMENT '状态(1-有效，0-无效)',
  `effective_date` datetime DEFAULT NULL COMMENT '生效日期',
  `expiry_date` datetime DEFAULT NULL COMMENT '失效日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `edu_bmb`
--

CREATE TABLE `edu_bmb` (
  `edu` tinyint(4) NOT NULL,
  `edu_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `edu_bmb`
--

INSERT INTO `edu_bmb` (`edu`, `edu_name`) VALUES
(0, '无'),
(1, '博士后'),
(2, '博士'),
(3, '硕士'),
(4, '研究生'),
(5, '大学本科'),
(6, '大学专科'),
(7, '高中'),
(8, '初中'),
(9, '小学');

-- --------------------------------------------------------

--
-- 表的结构 `excellentyouth`
--

CREATE TABLE `excellentyouth` (
  `ID_number` char(18) NOT NULL COMMENT '身份证号',
  `join_T_time` date DEFAULT NULL COMMENT '入团日期',
  `Tmember_meet_time` date DEFAULT NULL COMMENT '团员大会日期（团员推优时间）',
  `MZPY_addition` varchar(255) DEFAULT NULL COMMENT '团员大会民主评议情况',
  `FTW_advise` varchar(255) DEFAULT NULL COMMENT '分团委社和意见',
  `XTW_advise` varchar(255) DEFAULT NULL COMMENT '校团委审核意见'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `excellentyouth`
--

INSERT INTO `excellentyouth` (`ID_number`, `join_T_time`, `Tmember_meet_time`, `MZPY_addition`, `FTW_advise`, `XTW_advise`) VALUES
('21010619970322331X', '0000-01-01', NULL, NULL, NULL, NULL),
('334444666666667777', NULL, NULL, NULL, NULL, NULL),
('334569874523442344', NULL, NULL, NULL, NULL, NULL),
('223344199703223312', NULL, NULL, NULL, NULL, NULL),
('33223319970322331X', '0000-01-01', NULL, NULL, NULL, NULL),
('432456199703223333', NULL, NULL, NULL, NULL, NULL),
('246345199703223333', NULL, NULL, NULL, NULL, NULL),
('134134199703223311', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `home_place_bmb`
--

CREATE TABLE `home_place_bmb` (
  `place` char(6) NOT NULL,
  `place_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `home_place_bmb`
--

INSERT INTO `home_place_bmb` (`place`, `place_name`) VALUES
('000000', '无'),
('110000', '北京市'),
('110100', '北京市市辖区'),
('110101', '北京市东城区'),
('110102', '北京市西城区'),
('110103', '北京市崇文区'),
('110104', '北京市宣武区'),
('110105', '北京市朝阳区'),
('110106', '北京市丰台区'),
('110107', '北京市石景山区'),
('110108', '北京市海淀区'),
('110109', '北京市门头沟区'),
('110111', '北京市房山区'),
('110112', '北京市通州区'),
('110113', '北京市顺义区'),
('110200', '北京市县'),
('110221', '北京市昌平县'),
('110224', '北京市大兴县'),
('110226', '北京市平谷县'),
('110227', '北京市怀柔县'),
('110228', '北京市密云县'),
('110229', '北京市延庆县');

-- --------------------------------------------------------

--
-- 表的结构 `job_name_bmb`
--

CREATE TABLE `job_name_bmb` (
  `Job_ID` tinyint(4) NOT NULL,
  `Job_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `job_name_bmb`
--

INSERT INTO `job_name_bmb` (`Job_ID`, `Job_name`) VALUES
(0, '无'),
(1, '党委书记'),
(2, '党委副书记'),
(3, '党委组织委员'),
(4, '党委宣传委员'),
(5, '党委群工委员'),
(6, '党委体育委员'),
(7, '党支部书记'),
(8, '党支部组织委员'),
(9, '党支部宣传委员'),
(10, '党小组');

-- --------------------------------------------------------

--
-- 表的结构 `language_bmb`
--

CREATE TABLE `language_bmb` (
  `language` char(5) NOT NULL,
  `language_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `language_bmb`
--

INSERT INTO `language_bmb` (`language`, `language_name`) VALUES
('000', '无'),
('aar', 'Afar'),
('abk', 'Abkhaz'),
('ace', 'Achinese 亚齐语'),
('ach', 'Acoli 阿乔利语'),
('ada', 'Adangme 阿当梅语'),
('afa', 'Afro Asiatic(Other) 其它亚非语系'),
('afh', 'Afrihili(Aritifical language) 阿弗里希利语'),
('afr', 'Afrikaans 南非所用之荷兰语（阿非利卡语）'),
('aka', 'Akan 阿坎语'),
('akk', 'Akkadian 阿卡德语'),
('alb', 'Albanian 阿尔巴尼亚语'),
('ale', 'Aleut 阿留申群岛之土语'),
('alg', 'Algonquian(Other) 其它阿尔贡语系'),
('amh', 'Amharic 阿比尼亚宫廷贵族的语言（阿姆哈拉语，一种南族语）'),
('ang', 'English,Old(ca.450-3300) 古代英语'),
('apa', 'Apache languages 阿帕切语'),
('ara', 'Arabic 阿拉伯语'),
('arc', 'Aramaic 阿拉米语'),
('arm', 'Armenian 亚美尼亚语'),
('arn', 'Mapuche'),
('arp', 'Arapaho 阿拉帕霍语'),
('art', 'Artificial(Other) 其它人工语言'),
('arw', 'Arawak 阿拉瓦克语'),
('asm', 'Assamese 阿萨姆语'),
('ath', 'Athapascan(Other) 其它阿撒巴斯卡语系'),
('aus', 'Australian languages'),
('ava', 'Avaric 阿法语（阿瓦尔语）'),
('ave', 'Avestan 火教经（阿维斯塔语）'),
('awa', 'Awadhi 阿瓦乔语'),
('aym', 'Aymara 艾马拉语'),
('aze', 'Azerbaijani 阿塞拜疆语'),
('bad', 'Banda 班达语'),
('bai', 'Bamileke languages 巴米累克语'),
('bak', 'Bashkir 巴什基尔语'),
('bal', 'Baluchi 俾路支语'),
('bam', 'Bambara 班巴拉语'),
('ban', 'Balinese 巴里语'),
('baq', 'Basque 巴斯克语'),
('bas', 'Basa 巴萨语'),
('bat', 'Baltic(Other) 波罗的海地区之语言'),
('bej', 'Beja 别札语'),
('bel', 'Belarusian 白俄罗斯语'),
('bem', 'Bemba 别姆巴语'),
('ben', 'Bengali 孟加拉语'),
('ber', 'Berber(Other) 北非�回教土族之语言'),
('bho', 'Bhojpuri 博杰普尔语'),
('bih', 'Bihari'),
('bik', 'Bikol'),
('bin', 'Bini'),
('bis', 'Bislama'),
('bla', 'Siksika'),
('bnt', 'Bantu(Other)'),
('bra', 'Braj 布拉杰语'),
('bre', 'Breton 布尔吞语'),
('btk', 'Batak'),
('bua', 'Buriat'),
('bug', 'Buginese 布吉语'),
('bul', 'Bulgarian 保加利亚语'),
('bur', 'Burmese 缅甸语'),
('cad', 'Caddo 卡多语'),
('cai', 'Central American Indian(Other) 其它中美印第安语系'),
('car', 'Carib 巴勒比语'),
('cat', 'Catalan 加泰隆语'),
('cau', 'Caucasian(Other) 其它高加索语系'),
('ceb', 'Cebuano 宿务语'),
('cel', 'Celtic(Other) 其它凯尔特语系'),
('cha', 'Chamorro 查莫罗语'),
('chb', 'Chibcha 契布卡语'),
('che', 'Chechen 车臣语'),
('chg', 'Chagatai 查加语'),
('chi', 'Chinese 汉语'),
('chk', 'Truk 特鲁克语'),
('chm', 'Mari'),
('chn', 'Chinook Jargon 契努克语'),
('cho', 'Choctaw 乔克托语'),
('chp', 'Chipewyan'),
('chr', 'Cherokee 彻罗基语'),
('chu', 'Church Slavic 古代俄语（宗教斯拉夫语）'),
('chv', 'Chuvash 楚瓦什语'),
('chy', 'Cheyenne 夏延语（切延内语）'),
('cmc', 'Chamic languages'),
('cop', 'Coptic 埃及古语（科普特语）'),
('cor', 'Cornish 康瓦尔郡语（科尼什语）'),
('cos', 'Corsican'),
('cpe', 'Creoles and Pidgins,English-based(Other) 不纯粹之英国方言'),
('cpf', 'Creoles and Pidgins,French-based(Other) 不纯粹之法国方言'),
('cpp', 'Creoles and Pidgins,Portuguese-based(Other) 不纯粹之葡国方言'),
('cre', 'Cree 克里族语'),
('crp', 'Creoles and Pidgins(Other) 克里奥尔语和皮钦语'),
('cus', 'Cushitic(Other) 其它库施特语系'),
('cze', 'Czech 捷克语'),
('dak', 'Dakota 达科他语'),
('dan', 'Danish 丹麦语'),
('day', 'Dayak'),
('del', 'Delaware 特拉瓦印第安人语'),
('den', 'Slave'),
('dgr', 'Dogrib'),
('din', 'Dinka 丁卡语'),
('div', 'Divehi'),
('doi', 'Dogri 多格来语'),
('dra', 'Dravidian(Other) 其它德拉维语系'),
('dua', 'Duala 都阿拉语'),
('dum', 'Dutch,Middle(ca.3050-3350) 中古荷兰语'),
('dut', 'Dutch 荷兰语'),
('dyu', 'Dyula 迪尤拉语'),
('dzo', 'Dzongkha'),
('efi', 'Efik 艾非克语'),
('egy', 'Egyptian 埃及语'),
('eka', 'Ekajuk 艾卡朱克语'),
('elx', 'Elamite 艾拉米特语'),
('eng', 'English 英语'),
('enm', 'English,Middle(ca,3300-3500) 中古英语'),
('epo', 'Esperanto 世界语'),
('est', 'Estonian 爱沙尼亚语'),
('ewe', 'Ewe 幽语'),
('ewo', 'Ewondo'),
('fan', 'Fang 芳格语'),
('fao', 'Faroese 法罗语'),
('fat', 'Fanti 芳蒂语'),
('fij', 'Fijian 斐济语'),
('fin', 'Finnish 芬兰语'),
('fiu', 'Finno-Ugrian(Other) 芬匈语（其它）'),
('fon', 'Fon 丰语'),
('fre', 'French 法语'),
('frm', 'French,Middle(ca.3400-3600) 中古法语'),
('fro', 'French,Old(ca.842-3400) 古法语'),
('fry', 'Frisian 费里斯语'),
('ful', 'Fula 富拉语'),
('fur', 'Friulian'),
('gaa', 'Ga 加语'),
('gay', 'Gayo 迦约语'),
('gba', 'Gbaya'),
('gem', 'Germanic(Other) 其它德语语系'),
('geo', 'Georgian 外高加索语（格鲁吉亚语）'),
('ger', 'German 德语'),
('gez', 'Ethiopic 埃塞俄比亚语'),
('gil', 'Gilbertese 吉尔伯特斯语'),
('gla', 'Gaelic(Scots) 盖尔语'),
('gle', 'Irish 爱尔兰语'),
('glg', 'Galician'),
('glv', 'Manx 人岛语'),
('gmh', 'German,MiddleHigh(ca.3050-3500) 中古高地德语'),
('goh', 'German,OldHigh(ca.750-3050) 古代高地德语'),
('gon', 'Gondi 岗德语'),
('gor', 'Gorontalo'),
('got', 'Gothic 哥达语'),
('grb', 'Grebo 格列博语'),
('grc', 'Greek,Ancient(to 3453) 古希腊语'),
('gre', 'Greek,Modern(3453-) 近代希腊语'),
('grn', 'Guarani 瓜拉尼语'),
('guj', 'Gujarati 古吉拉特语'),
('gwi', 'Gwich’in'),
('hai', 'Haida 海达语'),
('hau', 'Hausa 豪萨语'),
('haw', 'Hawaiian 夏威夷语'),
('heb', 'Hebrew 希伯来语'),
('her', 'Herero 赫雷罗语'),
('hil', 'Hiligaynon 希利盖农语'),
('him', 'Himachali 赫马查利语'),
('hin', 'Hindi 北印度语（印地语）'),
('hit', 'Hittite'),
('hmn', 'Hmong'),
('hmo', 'Hiri Motu'),
('hun', 'Hungarian 匈牙利语'),
('hup', 'Hnpa 胡帕语'),
('iba', 'Iban 伊班语'),
('ibo', 'Igbo 伊格博语'),
('ice', 'Icelandic 冰岛语'),
('ijo', 'Ijo 伊乔语'),
('iku', 'Inuktitut'),
('ile', 'Interlingue'),
('ilo', 'Iloko 伊洛干诺语'),
('ina', 'Interligua(International Auxiliary Language Association) 国际辅助语'),
('inc', 'Indic(Other) 印度语（其它）'),
('ind', 'Indonesian 印尼语'),
('ine', 'Indo-European(Other) 其它印欧语系'),
('ipk', 'Inupiaq'),
('ira', 'Iranian(Other) 其它伊朗语系'),
('iro', 'Iroquoian(Other) 伊洛郭伊费语'),
('ita', 'Italian 意大利语'),
('jav', 'Javanese 爪哇语'),
('jpn', 'Japanese 日语'),
('jpr', 'Judeo-Persian 犹太�波斯语系'),
('jrb', 'Judeo-Arabic 犹太�阿拉伯语系'),
('kaa', 'Kara-Kalpak 卡拉卡尔帕克语'),
('kab', 'Kabyle 卡比尔语'),
('kac', 'Kachin 卡琴语'),
('kal', 'Kalatdlisut'),
('kam', 'Kamba 卡姆巴语'),
('kan', 'Kannada 坎纳达语'),
('kar', 'Karen 喀伦语'),
('kas', 'Kashmiri 克什米尔语'),
('kau', 'Kanuri 卡努里语'),
('kaw', 'Kawi'),
('kaz', 'Kazakh 哈萨克语'),
('kha', 'Khasi 卡西语'),
('khi', 'Khoisan(Other) 其它科伊桑语'),
('khm', 'Khmer 柬埔寨语'),
('kho', 'Khotanese 和田语'),
('kik', 'Kikuyu 吉库尤语'),
('kin', 'Kinyarwanda 卢旺达语'),
('kir', 'Kyrgyz 柯尔克孜语'),
('kmb', 'Kimbundu'),
('kok', 'Konkani 刚卡尼语'),
('kom', 'Komi'),
('kon', 'Kongo 刚果语'),
('kor', 'Korean 朝语'),
('kos', 'Kusaie'),
('kpe', 'Kpelle 克佩列语'),
('kro', 'Kru 克鲁语'),
('kru', 'Kurukh 库鲁克语'),
('kua', 'Kuanyama'),
('kum', 'Kumyk'),
('kur', 'Kurdish 库尔德语'),
('kut', 'Kutenai 库特内语'),
('lad', 'Ladino 拉迪诺语'),
('lah', 'Lahndi 拉亨达语'),
('lam', 'Lamba 兰巴语'),
('lao', 'Lao 老挝语'),
('lat', 'Latin 拉丁语'),
('lav', 'Latvian 拉托维亚语'),
('lez', 'Lezgian'),
('lin', 'Lingala'),
('lit', 'Lithuanian 立陶宛语'),
('lol', 'Mongo-Nkundu'),
('loz', 'Lozi'),
('ltz', 'Letzeburgesch'),
('lua', 'Luba-Lulua'),
('lub', 'Luba-Katanga 鲁巴�加丹加语'),
('lug', 'Ganda 卢干达语'),
('lui', 'Luiseno 路易塞诺语'),
('lun', 'Lunda 隆达语'),
('luo', 'Luo(Kenya & Tanzania)'),
('lus', 'Lushai'),
('mac', 'Macedonian 马其顿语'),
('mad', 'Madurese 马都拉语'),
('mag', 'Magahi 马加伊语'),
('mah', 'Marshall 马歇尔语'),
('mai', 'Maithili 迈蒂利语'),
('mak', 'Makasar 望加锡语'),
('mal', 'Malayalam 德威拉土语之一（马拉维拉姆语）'),
('man', 'Mandingo 曼丁哥语'),
('mao', 'Maori 毛利语'),
('map', 'Austronesian(Other) 其它马来亚玻里尼西亚语系'),
('mar', 'Marathi 马拉蒂语'),
('mas', 'Masai 萨伊语'),
('may', 'Malay 马来语'),
('mdr', 'Mandar'),
('men', 'Mende 门迪语'),
('mga', 'Irish, Middle(ca.3300-3500)'),
('mic', 'Micmac 米克马克语'),
('min', 'Minangkabau 米南卡保语'),
('mis', 'Miscellaneous(Other) 各种不同语言'),
('mkh', 'Mon-Khmer(Other)'),
('mlg', 'Malagasy 马拉加斯语'),
('mlt', 'Maltese 马尔他语'),
('mni', 'Manipuri 曼尼普里'),
('mno', 'Manobolanguages 马诺博污'),
('moh', 'Mohawk 摩霍克语'),
('mol', 'Moldavian 摩尔达维亚语'),
('mon', 'Mongolian 蒙古语'),
('mos', 'Moore'),
('mul', 'Multiple languages 多种语言'),
('mun', 'Munda(Other) 其它蒙达语'),
('mus', 'Creek 摩斯科格语（美国东南部印第安人）'),
('mwr', 'Marwari 马尔尼里语'),
('myn', 'Mayan Languages 玛雅语系'),
('nah', 'Nahuatl'),
('nai', 'North American Indian(Other) 其它北美印第安语系'),
('nau', 'Nauru'),
('nav', 'Navajo 纳瓦霍语'),
('nbl', 'Ndebele(South Africa)'),
('nde', 'Ndebele(Zimbabwe)'),
('ndo', 'Ndonga 恩东加语'),
('nep', 'Nepali 尼泊尔语'),
('new', 'Newari 尼瓦尔语'),
('nia', 'Nias'),
('nic', 'Niger-Kordofanian(Other) 其它尼日尔刚果语系'),
('niu', 'Niuean 纽埃语'),
('non', 'Old Norse'),
('nor', 'Norwegian 挪威语'),
('nso', 'Northern Sotho 北索托语'),
('nub', 'Nubian languages 努比亚语'),
('nya', 'Nyanja 尼昂加语'),
('nym', 'Nyamwezi 尼亚姆韦齐语'),
('nyn', 'Nyankole'),
('nyo', 'Nyoro 尼约罗语族'),
('nzi', 'Nzima'),
('oci', 'Occitan(post-3500)'),
('oji', 'Ojibwa 北美印第安人�大种族之语（奥季布瓦语）'),
('ori', 'Oriya 奥里亚语'),
('orm', 'Oromo 奥罗英语'),
('osa', 'Osage 奥萨哲语'),
('oss', 'Ossetic 奥塞提语'),
('ota', 'Turkish,Ottoman 奥托曼土耳其语'),
('oto', 'Otomian languages 奥托米语系'),
('paa', 'Papuan-Australian(Other) 其它巴布亚�澳洲语系'),
('pag', 'Pangasinan 邦阿西南语'),
('pal', 'Pahlavi 帕拉维语'),
('pam', 'Pampanga 邦板牙语'),
('pan', 'Panjabi 旁遮普语'),
('pap', 'Papiamento 帕皮亚内托语'),
('pau', 'Palauan 帕劳语'),
('peo', 'Old Persian(ca.600-400B.C.)'),
('per', 'Persian 波斯语'),
('phi', 'Philippine(Other) 其它菲律宾语系'),
('phn', 'Phoenician'),
('pli', 'Pali 帕利语'),
('pol', 'Polish 波兰语'),
('pon', 'Ponape 波纳佩语'),
('por', 'Portuguese 葡萄牙语'),
('pra', 'Prakrit languages 印度古代及中世纪之中部及北部方言'),
('pro', 'Provencal,Old(to 3500) 中世纪法国南部之语（普罗文斯语）'),
('pus', 'Pushto 普什图语'),
('que', 'Quechua 盖丘亚语'),
('raj', 'Rajasthani 拉贾斯坦语'),
('rap', 'Rapanui'),
('rar', 'Rarotongan 拉罗汤加语'),
('roa', 'Romance(Other) 其它拉丁语系'),
('roh', 'Raeto-Romance 罗曼斯方言'),
('rom', 'Romany 吉普赛语'),
('rum', 'Romanian 罗马尼亚语'),
('run', 'Rundi 隆迪语'),
('rus', 'Russian 俄语'),
('sad', 'Sandawe 散达维语'),
('sag', 'Sango 桑戈语'),
('sah', 'Yakut'),
('sai', 'South American Indian(Other)其它南美印第安语系'),
('sal', 'Salishan languages 萨利什语'),
('sam', 'Samaritan Aramaic 萨玛利亚语'),
('san', 'Sanskrit 梵语'),
('sas', 'Sasak'),
('sat', 'Santali'),
('scc', 'Serbo-Croatian(Cyrillic) 塞尔维亚�克罗地亚语（基里尔字母之一）'),
('sco', 'Scots 苏格兰语'),
('scr', 'Serbo-Croatian(Roman) 塞尔维亚�克罗地亚语（罗马字母）'),
('sel', 'Selkup 塞尔库普语'),
('sem', 'Semitic(Other) 其它闪族语系'),
('sga', 'Irish(Old) to 3300'),
('sgn', 'Sign languages'),
('shn', 'Shan 掸语'),
('sid', 'Sidamo 悉达摩语'),
('sin', 'Sinhalese 僧加罗语（锡兰语）'),
('sio', 'Siouan(Other) 苏语诸语言（北美印第安语系）'),
('sit', 'Sino-Tibetan(Other) 其它汉藏语系'),
('sla', 'Slavic(Other) 其它斯拉夫语系'),
('slo', 'Slovak 斯洛伐克语'),
('slv', 'Slovenian 斯洛文尼亚语'),
('smi', 'Sami languages(Other)'),
('smo', 'Samoan 萨摩亚语'),
('sna', 'Shona 绍纳语'),
('snd', 'Sindhi 信德语'),
('snk', 'Soninke'),
('sog', 'Sogdian 索格迪亚语'),
('som', 'Somali 索马里语'),
('son', 'Songhai 桑海语'),
('sot', 'Sotho 索托语'),
('spa', 'Spanish 西班牙语'),
('srd', 'Sardinian'),
('srr', 'Serer 谢列尔语'),
('ssa', 'Nilo-Saharan(Other) 非洲撒哈拉沙漠边缘地带之语言'),
('ssw', 'Swazi 斯威士语'),
('suk', 'Sukuma 苏库马语'),
('sun', 'Sundanese'),
('sus', 'Susu 苏苏语'),
('sux', 'Sumerian 苏马语'),
('swa', 'Swahili 斯瓦西里语'),
('swe', 'Swedish 瑞典语'),
('syr', 'Syriac 叙利亚语'),
('tah', 'Tahitian 塔西提语'),
('tai', 'Tai(Other)'),
('tam', 'Tamil 泰米尔语'),
('tat', 'Tatar 塔塔尔语'),
('tel', 'Telugu 泰卢固语'),
('tem', 'Temne 提姆语'),
('ter', 'Terena 泰雷诺语'),
('tet', 'Tetum'),
('tgk', 'Tajik 塔吉克语'),
('tgl', 'Tagalog 他加禄语'),
('tha', 'Thai 泰语'),
('tib', 'Tibetan 藏语'),
('tig', 'Tigre 提格雷语'),
('tir', 'Tigrinya 底格里语'),
('tiv', 'Tiv 蒂夫语'),
('tkl', 'Tokelauan'),
('tli', 'Tlingit 特林吉特语'),
('tmh', 'Tamashek'),
('tog', 'Tonga(Nyasa) 汤加语（尼亚萨地区）'),
('ton', 'Tonga(Tonga Islands) 汤加语（汤加岛）'),
('tpi', 'Tok Pisin'),
('tsi', 'Tsimshian 蒂姆西亚语'),
('tsn', 'Tswana 茨瓦纳语'),
('tso', 'Tsonga 聪加语'),
('tuk', 'Turkmen 土库曼语'),
('tum', 'Tumbuka 通布卡语'),
('tur', 'Turkish 土耳其语'),
('tut', 'Altaic(Other) 其它阿尔泰语系'),
('tvl', 'Tuvalu'),
('twi', 'Twi 特威语'),
('tyv', 'Tuvinian'),
('uga', 'Ugaritic 乌加里特语'),
('uig', 'Uighur 唯吾尔语'),
('ukr', 'Ukrainian 乌克兰语'),
('umb', 'Umbundu 莱都（姆崩杜语）'),
('und', 'Undetermined 未定语种'),
('urd', 'Urdu 印度斯坦回教徒所通用之一种语言（乌尔都语）'),
('uzb', 'Uzbek 乌兹别克语'),
('vai', 'Vai 瓦伊语'),
('ven', 'Venda 文达语'),
('vie', 'Vietnamese 越南语'),
('vol', 'Volapuk'),
('vot', 'Votic 沃提克语'),
('wak', 'Wakashan languages'),
('wal', 'Walamo 瓦拉莫语'),
('war', 'Warav'),
('was', 'Washo 瓦绍语'),
('wel', 'Welsh 威尔斯语'),
('wen', 'Sorbian languages 索布诸语言（西斯拉夫诸语言和方言）'),
('wol', 'Wolof 沃洛夫语'),
('xho', 'Xhosa 科萨语'),
('yao', 'Yao 瑶族语'),
('yap', 'Yap 雅浦语'),
('yid', 'Yiddish 依地语'),
('yor', 'Yoruba 约鲁巴语'),
('ypk', 'Yupik languages'),
('zap', 'Zapotec 萨波蒂克语'),
('zen', 'Zenaga 泽纳加语'),
('zha', 'Zhuang'),
('znd', 'Zande'),
('zul', 'Zulu 祖鲁语'),
('zun', 'Zuni 祖尼语');

-- --------------------------------------------------------

--
-- 表的结构 `major_bmb`
--

CREATE TABLE `major_bmb` (
  `major` char(4) NOT NULL,
  `major_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `major_bmb`
--

INSERT INTO `major_bmb` (`major`, `major_name`) VALUES
('0000', '无'),
('0303', '电子信息工程'),
('0305', '计算机科学与技术'),
('0306', '通信工程'),
('0307', '电子信息科学'),
('0511', '网络工程');

-- --------------------------------------------------------

--
-- 表的结构 `nation_bmb`
--

CREATE TABLE `nation_bmb` (
  `nation` tinyint(4) NOT NULL,
  `nation_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `nation_bmb`
--

INSERT INTO `nation_bmb` (`nation`, `nation_name`) VALUES
(0, '无'),
(1, '汉族'),
(2, '蒙古族'),
(3, '回族'),
(4, '藏族'),
(5, '维吾尔族'),
(6, '苗族'),
(7, '彝族'),
(8, '壮族'),
(9, '布依族'),
(10, '朝鲜族'),
(11, '满族'),
(12, '侗族'),
(13, '瑶族'),
(14, '白族'),
(15, '土家族'),
(16, '哈尼族'),
(17, '哈萨克族'),
(18, '傣族'),
(19, '黎族'),
(20, '傈僳族'),
(21, '佤族'),
(22, '畲族'),
(23, '高山族'),
(24, '拉祜族'),
(25, '水族'),
(26, '东乡族'),
(27, '纳西族'),
(28, '景颇族'),
(29, '柯尔克孜族'),
(30, '土族'),
(31, '达斡尔族'),
(32, '仫佬族'),
(33, '羌族'),
(34, '布朗族'),
(35, '撒拉族'),
(36, '毛难族'),
(37, '仡佬族'),
(38, '锡伯族'),
(39, '阿昌族'),
(40, '普米族'),
(41, '塔吉克族'),
(42, '怒族'),
(43, '乌孜别克族'),
(44, '俄罗斯族'),
(45, '鄂温克族'),
(46, '崩龙族'),
(47, '保安族'),
(48, '裕固族'),
(49, '京族'),
(50, '塔塔尔族'),
(51, '独龙族'),
(52, '鄂伦春族'),
(53, '赫哲族'),
(54, '门巴族'),
(55, '珞巴族'),
(56, '基诺族'),
(97, '其他');

-- --------------------------------------------------------

--
-- 表的结构 `organization`
--

CREATE TABLE `organization` (
  `SJDepartment` char(9) DEFAULT NULL COMMENT '上级组织机构ID',
  `Department_ID` char(9) NOT NULL COMMENT '组织机构ID',
  `name` varchar(255) DEFAULT NULL COMMENT '全称',
  `shortname` varchar(255) DEFAULT NULL COMMENT '简称',
  `state` tinyint(4) DEFAULT NULL COMMENT '状态(1-有效，0-无效)',
  `effective_date` date DEFAULT NULL COMMENT '生效日期',
  `expiry_date` date DEFAULT NULL COMMENT '失效日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `organization`
--

INSERT INTO `organization` (`SJDepartment`, `Department_ID`, `name`, `shortname`, `state`, `effective_date`, `expiry_date`) VALUES
(NULL, '000000000', NULL, NULL, NULL, NULL, NULL),
('000000000', '00C000100', '一', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ororp`
--

CREATE TABLE `ororp` (
  `Department_ID` char(9) NOT NULL COMMENT '组织机构ID',
  `type` tinyint(4) DEFAULT NULL COMMENT '奖惩类型-奖1、惩0',
  `award_rank` tinyint(4) DEFAULT NULL COMMENT '奖惩级别-国家1、省2、市3、校4',
  `Time` date DEFAULT NULL COMMENT '时间',
  `JC_explain` varchar(255) DEFAULT NULL COMMENT '奖惩情况说明',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `participator`
--

CREATE TABLE `participator` (
  `job_ID` int(11) NOT NULL COMMENT '工作ID',
  `ID_number` char(18) NOT NULL COMMENT '身份证号',
  `take_job` varchar(255) DEFAULT NULL COMMENT '承担的工作'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `personnelinformation`
--

CREATE TABLE `personnelinformation` (
  `ID_number` char(18) NOT NULL COMMENT '身份证号',
  `person_cate1` tinyint(4) NOT NULL COMMENT '类别1教研本',
  `instructor_mark` tinyint(4) DEFAULT NULL COMMENT '1是导员',
  `person_cate2` tinyint(4) NOT NULL DEFAULT '6' COMMENT '人员类别2',
  `major` char(4) DEFAULT '0000' COMMENT '专业',
  `class` char(8) DEFAULT '00000000' COMMENT '班级（学生）',
  `stu_number` char(10) DEFAULT '0000000000' COMMENT '学号（学生）',
  `name` varchar(10) NOT NULL DEFAULT '000' COMMENT '姓名',
  `sex` tinyint(4) DEFAULT '0' COMMENT '性别-男0、女1',
  `Datetime` date DEFAULT '0000-01-01' COMMENT '出生日期',
  `nation` tinyint(4) DEFAULT '0' COMMENT '民族',
  `native_place` varchar(255) DEFAULT '' COMMENT '籍贯',
  `politics_status` tinyint(4) DEFAULT '0' COMMENT '政治面貌',
  `language` char(5) DEFAULT '000' COMMENT '外语语种',
  `edu` tinyint(4) DEFAULT '0' COMMENT '学历',
  `degree` tinyint(4) DEFAULT '0' COMMENT '学位',
  `graduation_date` date DEFAULT '0000-01-01' COMMENT '毕业日期',
  `Home_Add` varchar(255) DEFAULT '无' COMMENT '家庭住址所在地',
  `Home_Add_Detail` varchar(255) DEFAULT '-' COMMENT '家庭详细地址',
  `zip_code` char(6) DEFAULT '000000' COMMENT '邮政编码',
  `police_station` varchar(255) DEFAULT '无' COMMENT '户口所在派出所',
  `tel` char(11) DEFAULT '00000000000' COMMENT '联系电话',
  `strong_point` varchar(255) DEFAULT '-' COMMENT '特长',
  `floor_number` char(2) DEFAULT '0' COMMENT '楼号（学生）',
  `dormitory_number` char(3) DEFAULT '000' COMMENT '寝室号（学生）',
  `bed_number` char(2) DEFAULT '0' COMMENT '床号（学生）',
  `instructor_ID` char(18) DEFAULT '000000000000000000' COMMENT '辅导员ID（学生）',
  `Department_ID` char(9) DEFAULT '000000000' COMMENT '组织机构ID',
  `state` char(4) DEFAULT '1' COMMENT '状态-在校1、毕业2、调出3',
  `adminis_fun` varchar(255) DEFAULT NULL COMMENT '行政职务',
  `join_T_time` date DEFAULT NULL COMMENT '入团时间',
  `Tmember_meet_time` date DEFAULT NULL COMMENT '团员大会日期（团员推优时间）',
  `publicity_time` date DEFAULT NULL COMMENT '接收预备党员公示时间',
  `ZZ_publicity_time` date DEFAULT NULL COMMENT '预备党员转正公示时间',
  `JJPX_time` date DEFAULT NULL COMMENT '入党积极分子培训时间',
  `JJPX_mark` tinyint(4) DEFAULT NULL COMMENT '入党积极分子培训成绩',
  `DQPX_time` date DEFAULT NULL COMMENT '党前培训时间',
  `DQPX_mark` tinyint(4) DEFAULT NULL COMMENT '党前培训成绩',
  `SQRD_time` date DEFAULT NULL COMMENT '申请入党时间',
  `LJJ_time` date DEFAULT NULL COMMENT '列积极分子时间',
  `LFZobject_time` date DEFAULT NULL COMMENT '列发展对象时间',
  `developmentplan_time` date DEFAULT NULL COMMENT '计划发展时间',
  `ranking` decimal(4,3) DEFAULT NULL COMMENT '班级综合测评名次/班级人数（学生）',
  `all_funkobject_amount` int(11) DEFAULT '0' COMMENT '全学程不及格门数（学生）',
  `TC_and_BZ` varchar(255) DEFAULT NULL COMMENT '突出表现和存在不足',
  `reward_condtion` varchar(255) DEFAULT NULL COMMENT '获奖情况',
  `YorNwrong` tinyint(4) DEFAULT '0' COMMENT '处分情况 0-无处分 1-有处分',
  `RD_datetime` date DEFAULT NULL COMMENT '入党时间（支部接收预备党员会时间）',
  `ZQ_positivemeet_ID` varchar(255) DEFAULT NULL COMMENT '支部确定入党积极分子会ID',
  `ZQ_devemembermeet_ID` varchar(255) DEFAULT NULL COMMENT '支部确定发展对象会ID',
  `ZJ_readymeet_ID` varchar(255) DEFAULT NULL COMMENT '支部接收预备党员会ID',
  `ZSbec_officialmeet_ID` varchar(255) DEFAULT NULL COMMENT '支部预备党员转正会ID',
  `DS_readymeet_ID` varchar(255) DEFAULT NULL COMMENT '党委审批预备党员会ID',
  `bec_officialmeet_ID` varchar(255) DEFAULT NULL COMMENT '党委审批预备党员转正会ID',
  `talker_ID` char(18) DEFAULT NULL COMMENT '谈话人ID（党委派专人谈话）',
  `talk_time` date DEFAULT NULL COMMENT '谈话时间（党委派专人谈话）',
  `talk_site` varchar(255) DEFAULT NULL COMMENT '谈话地点（党委派专人谈话）',
  `bec_official_time` date DEFAULT NULL COMMENT '转正时间（支部预备党员转正会）',
  `in_time` date DEFAULT NULL COMMENT '党员转入时间',
  `in_where` varchar(255) DEFAULT NULL COMMENT '转入自何处',
  `out_time` date DEFAULT NULL COMMENT '党员转出时间',
  `gowhere` varchar(255) DEFAULT NULL COMMENT '转去何处',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='人员信息表';

--
-- 转存表中的数据 `personnelinformation`
--

INSERT INTO `personnelinformation` (`ID_number`, `person_cate1`, `instructor_mark`, `person_cate2`, `major`, `class`, `stu_number`, `name`, `sex`, `Datetime`, `nation`, `native_place`, `politics_status`, `language`, `edu`, `degree`, `graduation_date`, `Home_Add`, `Home_Add_Detail`, `zip_code`, `police_station`, `tel`, `strong_point`, `floor_number`, `dormitory_number`, `bed_number`, `instructor_ID`, `Department_ID`, `state`, `adminis_fun`, `join_T_time`, `Tmember_meet_time`, `publicity_time`, `ZZ_publicity_time`, `JJPX_time`, `JJPX_mark`, `DQPX_time`, `DQPX_mark`, `SQRD_time`, `LJJ_time`, `LFZobject_time`, `developmentplan_time`, `ranking`, `all_funkobject_amount`, `TC_and_BZ`, `reward_condtion`, `YorNwrong`, `RD_datetime`, `ZQ_positivemeet_ID`, `ZQ_devemembermeet_ID`, `ZJ_readymeet_ID`, `ZSbec_officialmeet_ID`, `DS_readymeet_ID`, `bec_officialmeet_ID`, `talker_ID`, `talk_time`, `talk_site`, `bec_official_time`, `in_time`, `in_where`, `out_time`, `gowhere`, `remark`) VALUES
('000000000000000000', 1, 1, 6, '0000', '00000000', '0000000000', 'undefined', 0, '0000-01-01', 0, '000000', 0, '000', 0, 0, '0000-01-01', '000000', '-', '000000', '000000', '00000000000', '-', '0', '000', '0', '000000000000000000', '000000000', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '000000000000000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('134134199703223311', 1, NULL, 1, '0000', '00000000', '0000000000', '预备转t', 0, '0000-01-01', 0, '', 0, '000', 0, 0, '0000-01-01', '无', '-', '000000', '无', '00000000000', '-', '0', '000', '0', '000000000000000000', '000000000', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('21010619970322331X', 3, 0, 5, '0303', '00000000', '0000000000', '岳贤哲2', 0, '0000-01-01', 1, '辽宁省-沈阳市-和平区', 0, '000', 5, 0, '0000-01-01', '000000', '-', '000000', '2222', '00000000000', '-', '0', '000', '0', '334444666666667777', '00C000100', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-01-01', '0000-01-01', NULL, NULL, '0.000', 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123'),
('223344199703223312', 1, NULL, 4, '0000', '00000000', '0000000000', '积极tea3', 1, '0000-01-01', 0, '', 0, '000', 0, 0, '0000-01-01', '无', '-', '000000', '无', '00000000000', '-', '0', '000', '0', '000000000000000000', '000000000', '1', NULL, NULL, '2017-07-25', NULL, NULL, '2017-07-25', 23, NULL, NULL, '2000-01-01', '2000-01-01', NULL, NULL, NULL, 0, '', '', 0, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
('246345199703223333', 3, NULL, 1, '0000', '00000000', '0000000000', '与被传stu', 0, '0000-01-01', 0, '', 0, '000', 0, 0, '0000-01-01', '无', '-', '000000', '无', '00000000000', '-', '0', '000', '0', '000000000000000000', '000000000', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('33223319970322331X', 3, NULL, 2, '0000', '00000000', '0000000000', '预备stu', 0, '0000-01-01', 1, '', 0, '000', 0, 0, '0000-01-01', '无', '-', '000000', '无', '00000000000', '-', '0', '000', '0', '000000000000000000', '000000000', '1', NULL, NULL, '0000-01-01', NULL, NULL, '0000-01-01', 34, NULL, NULL, '0000-01-01', '0000-01-01', NULL, NULL, '0.000', 0, '', '', 0, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
('334444666666667777', 1, 1, 5, '0000', '00000000', '0000000000', '付立冬', 1, '0000-01-01', 2, '北京市-北京市市辖区-东城区', 0, '000', 0, 0, '0000-01-01', '无', '-', '000000', '无', '00000000000', '-', '0', '000', '0', '334444666666667777', '000000000', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2000-01-01', '2000-01-01', NULL, NULL, NULL, 0, '', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
('334569874523442344', 3, NULL, 4, '0000', '00000000', '0000000000', '积极分', 0, '0000-01-01', 0, '', 0, '000', 0, 0, '0000-01-01', '无', '-', '000000', '无', '00000000000', '-', '0', '000', '0', '000000000000000000', '000000000', '1', NULL, NULL, '0000-01-01', NULL, NULL, '0000-01-01', 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('432456199703223333', 1, NULL, 2, '0000', '00000000', '0000000000', '预备tea', 0, '0000-01-01', 0, '', 0, '000', 0, 0, '0000-01-01', '无', '-', '000000', '无', '00000000000', '-', '0', '000', '0', '000000000000000000', '000000000', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- 触发器 `personnelinformation`
--
DELIMITER $$
CREATE TRIGGER `personnelinformation_to_activist` AFTER INSERT ON `personnelinformation` FOR EACH ROW INSERT INTO activist(ID_number) VALUES(new.ID_number)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `personnelinformation_to_confirmationletter` AFTER INSERT ON `personnelinformation` FOR EACH ROW INSERT INTO confirmationletter(ID_number) VALUES (new.ID_number)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `personnelinformation_to_excellentyouth` AFTER INSERT ON `personnelinformation` FOR EACH ROW insert into excellentyouth(ID_number) values(new.ID_number)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `personnelinformation_to_pm_publicity` AFTER INSERT ON `personnelinformation` FOR EACH ROW INSERT INTO pm_publicity(ID_number) VALUES (new.ID_number)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `personnelinformation_to_ppm_publicity` AFTER INSERT ON `personnelinformation` FOR EACH ROW INSERT INTO ppm_publicity(ID_number) VALUES (new.ID_number)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `personnelinformation_to_stage` AFTER INSERT ON `personnelinformation` FOR EACH ROW INSERT INTO stage(ID_number) VALUES (new.ID_number)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `personnelinformation_to_train` AFTER INSERT ON `personnelinformation` FOR EACH ROW INSERT INTO train(ID_number) VALUES (new.ID_number)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `person_cate1_bmb`
--

CREATE TABLE `person_cate1_bmb` (
  `Person_cate1_` tinyint(4) NOT NULL,
  `Person_cate1_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `person_cate1_bmb`
--

INSERT INTO `person_cate1_bmb` (`Person_cate1_`, `Person_cate1_name`) VALUES
(1, '教师'),
(2, '研究生'),
(3, '本科生');

-- --------------------------------------------------------

--
-- 表的结构 `person_cate2_bmb`
--

CREATE TABLE `person_cate2_bmb` (
  `person_cate2_` tinyint(4) NOT NULL,
  `person_cate2_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `person_cate2_bmb`
--

INSERT INTO `person_cate2_bmb` (`person_cate2_`, `person_cate2_name`) VALUES
(1, '正式党员'),
(2, '预备党员'),
(3, '发展对象'),
(4, '入党积极分子'),
(5, '申请人'),
(6, '普通群众');

-- --------------------------------------------------------

--
-- 表的结构 `pm_publicity`
--

CREATE TABLE `pm_publicity` (
  `ID_number` char(18) NOT NULL COMMENT '身份证号',
  `company_receive_adv` varchar(255) DEFAULT NULL COMMENT '公示期间收集到的意见',
  `survey_condtion` varchar(255) DEFAULT NULL COMMENT '调查核实情况',
  `J_solve_adv` varchar(255) DEFAULT NULL COMMENT '见处理意见',
  `ins_condition_GJ` varchar(255) DEFAULT NULL COMMENT '预备期审查会提出的不足改进情况',
  `per_condition` varchar(255) DEFAULT NULL COMMENT '预备期内表现及存在的不足',
  `CF_condition` varchar(255) DEFAULT NULL COMMENT '预备期内处分情况'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `pm_publicity`
--

INSERT INTO `pm_publicity` (`ID_number`, `company_receive_adv`, `survey_condtion`, `J_solve_adv`, `ins_condition_GJ`, `per_condition`, `CF_condition`) VALUES
('21010619970322331X', NULL, NULL, NULL, NULL, NULL, NULL),
('334444666666667777', NULL, NULL, NULL, NULL, NULL, NULL),
('334569874523442344', NULL, NULL, NULL, NULL, NULL, NULL),
('223344199703223312', NULL, NULL, NULL, NULL, NULL, NULL),
('33223319970322331X', NULL, NULL, NULL, NULL, NULL, NULL),
('432456199703223333', NULL, NULL, NULL, NULL, NULL, NULL),
('246345199703223333', NULL, NULL, NULL, NULL, NULL, NULL),
('134134199703223311', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `polity_bmb`
--

CREATE TABLE `polity_bmb` (
  `politics_status` tinyint(4) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `polity_bmb`
--

INSERT INTO `polity_bmb` (`politics_status`, `name`) VALUES
(0, '无'),
(1, '中共党员'),
(2, '中共预备党员'),
(3, '共青团员'),
(4, '民革会员'),
(5, '民盟盟员'),
(6, '民建会员'),
(7, '民进会员'),
(8, '农工党党员'),
(9, '致公党党员'),
(10, '九三学社社员'),
(11, '台盟盟员'),
(12, '无党派民主人士'),
(13, '群众');

-- --------------------------------------------------------

--
-- 表的结构 `ppm_publicity`
--

CREATE TABLE `ppm_publicity` (
  `ID_number` char(18) NOT NULL COMMENT '身份证号',
  `GS_Sadvise` varchar(255) DEFAULT NULL COMMENT '公示期间收集到的意见',
  `DC_condtion` varchar(255) DEFAULT NULL COMMENT '调查核实情况',
  `CL_advise` varchar(255) DEFAULT NULL COMMENT '处理意见'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ppm_publicity`
--

INSERT INTO `ppm_publicity` (`ID_number`, `GS_Sadvise`, `DC_condtion`, `CL_advise`) VALUES
('21010619970322331X', NULL, NULL, NULL),
('334444666666667777', NULL, NULL, NULL),
('334569874523442344', NULL, NULL, NULL),
('223344199703223312', NULL, NULL, NULL),
('33223319970322331X', NULL, NULL, NULL),
('432456199703223333', NULL, NULL, NULL),
('246345199703223333', NULL, NULL, NULL),
('134134199703223311', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `rorp`
--

CREATE TABLE `rorp` (
  `reward_id` int(10) NOT NULL COMMENT '奖惩主键',
  `ID_number` char(18) NOT NULL COMMENT '身份证号',
  `type` tinyint(4) DEFAULT NULL COMMENT '奖惩类型-奖1、惩0',
  `award_rank` tinyint(4) DEFAULT NULL COMMENT '奖励级别-国家1、省2、市3、校4',
  `Time` date DEFAULT NULL COMMENT '时间',
  `JC_explain` varchar(255) DEFAULT NULL COMMENT '情况说明',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `stage`
--

CREATE TABLE `stage` (
  `ID` int(11) NOT NULL,
  `ID_number` char(18) NOT NULL COMMENT '身份证号',
  `docu_type` tinyint(4) DEFAULT NULL COMMENT '文档类型bmb',
  `sub_date` date DEFAULT NULL COMMENT '提交日期',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `stage`
--

INSERT INTO `stage` (`ID`, `ID_number`, `docu_type`, `sub_date`, `remark`) VALUES
(1, '21010619970322331X', NULL, NULL, NULL),
(2, '334444666666667777', NULL, NULL, NULL),
(3, '334569874523442344', NULL, NULL, NULL),
(4, '223344199703223312', NULL, NULL, NULL),
(5, '223344199703223312', NULL, NULL, NULL),
(7, '223344199703223312', 3, '2017-07-23', NULL),
(8, '223344199703223312', 2, '2017-07-15', NULL),
(9, '334569874523442344', 2, '2017-07-15', NULL),
(10, '33223319970322331X', NULL, NULL, NULL),
(11, '432456199703223333', NULL, NULL, NULL),
(13, '246345199703223333', NULL, NULL, NULL),
(14, '134134199703223311', NULL, NULL, NULL),
(15, '223344199703223312', 4, '2017-08-09', NULL),
(20, '223344199703223312', 5, '2017-09-02', NULL),
(21, '334569874523442344', 3, '2018-01-12', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `task`
--

CREATE TABLE `task` (
  `job_ID` int(11) NOT NULL COMMENT '工作ID',
  `Datetime` datetime DEFAULT NULL COMMENT '日期时间',
  `job_theme` varchar(255) DEFAULT NULL COMMENT '工作主题',
  `job_content` varchar(255) DEFAULT NULL COMMENT '工作内容',
  `performance` varchar(255) DEFAULT NULL COMMENT '完成情况',
  `Department_ID` char(9) NOT NULL COMMENT '承担部门ID',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `photo` varchar(255) DEFAULT NULL COMMENT '照片'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `train`
--

CREATE TABLE `train` (
  `ID` int(11) NOT NULL,
  `ID_number` char(18) NOT NULL COMMENT '身份证号',
  `train_memory` varchar(255) DEFAULT NULL COMMENT '手写培训总结',
  `bookname` varchar(255) DEFAULT NULL COMMENT '手写教材名称',
  `mark` tinyint(4) DEFAULT NULL COMMENT '成绩',
  `Fschool_advise` varchar(255) DEFAULT NULL COMMENT '手写学校意见',
  `exam_date` date DEFAULT NULL COMMENT '考试日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `train`
--

INSERT INTO `train` (`ID`, `ID_number`, `train_memory`, `bookname`, `mark`, `Fschool_advise`, `exam_date`) VALUES
(1, '21010619970322331X', NULL, NULL, NULL, NULL, NULL),
(2, '334444666666667777', NULL, NULL, NULL, NULL, NULL),
(8, '223344199703223312', '12', '122', 1, '1', '2017-07-19'),
(9, '223344199703223312', '2', '2', 2, '2', '2017-07-01'),
(11, '223344199703223312', '2', '233', 2, '2', '2017-07-01'),
(12, '334569874523442344', '1', '1', 1, '1', '2017-07-08'),
(14, '33223319970322331X', '2', '2', 2, '2', '2017-07-07'),
(17, '246345199703223333', NULL, NULL, NULL, NULL, NULL),
(18, '134134199703223311', NULL, NULL, NULL, NULL, NULL),
(19, '223344199703223312', '2', '233', 44, '2', '2017-07-01'),
(24, '223344199703223312', '123132', '123123', 22, '123123', '2017-09-07'),
(25, '223344199703223312', '12313233', '123123', 22, '123123', '2017-09-07'),
(26, '223344199703223312', '12313233', '123123', 22, '123123', '2017-09-07'),
(27, '223344199703223312', '12313233', '123123333', 22, '123123', '2017-09-07'),
(28, '223344199703223312', '2', '233', 6, '2', '2017-07-01'),
(29, '432456199703223333', '24', '234', 23, '234', '2017-09-09'),
(30, '223344199703223312', '2', '233', 2, '2', '2017-07-01'),
(31, '223344199703223312', '2', '233', 6, '2333', '2017-07-01');

-- --------------------------------------------------------

--
-- 表的结构 `unappearance`
--

CREATE TABLE `unappearance` (
  `Activity_ID` int(11) NOT NULL COMMENT '活动ID',
  `ID_number` char(18) NOT NULL COMMENT '身份证号',
  `absent_reason` varchar(255) DEFAULT NULL COMMENT '缺席原因'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `unattend`
--

CREATE TABLE `unattend` (
  `conference_ID` int(11) NOT NULL COMMENT '会议ID',
  `ID_number` char(18) NOT NULL COMMENT '身份证号',
  `absent_reason` varchar(255) DEFAULT NULL COMMENT '缺席原因'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `ID_number` char(18) NOT NULL COMMENT '身份证号',
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `password` char(160) DEFAULT NULL COMMENT '密码（SHA1）',
  `type` tinyint(4) DEFAULT NULL COMMENT '类型',
  `rights` tinyint(4) DEFAULT NULL COMMENT '权限'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`ID_number`, `username`, `password`, `type`, `rights`) VALUES
('000000000000000000', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activist`
--
ALTER TABLE `activist`
  ADD KEY `Activist` (`ID_number`),
  ADD KEY `trainer1_ID` (`trainer1_ID`),
  ADD KEY `trainer2_ID` (`trainer2_ID`);

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`Activity_ID`),
  ADD KEY `Department_ID` (`Department_ID`),
  ADD KEY `join_depart` (`join_depart`);

--
-- Indexes for table `appearance`
--
ALTER TABLE `appearance`
  ADD PRIMARY KEY (`Activity_ID`),
  ADD KEY `Activity_ID` (`Activity_ID`),
  ADD KEY `ID_number` (`ID_number`);

--
-- Indexes for table `appraisement`
--
ALTER TABLE `appraisement`
  ADD PRIMARY KEY (`appraisement_id`),
  ADD KEY `Appraisement` (`ID_number`);

--
-- Indexes for table `arrears`
--
ALTER TABLE `arrears`
  ADD PRIMARY KEY (`arrears_id`),
  ADD KEY `Arrears` (`ID_number`);

--
-- Indexes for table `attend`
--
ALTER TABLE `attend`
  ADD KEY `Attend` (`conference_ID`),
  ADD KEY `Attend1` (`ID_number`);

--
-- Indexes for table `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`conference_ID`),
  ADD KEY `conference_ibfk_1` (`Department_ID`),
  ADD KEY `conference_type` (`conference_type`);

--
-- Indexes for table `conference_type_bmb`
--
ALTER TABLE `conference_type_bmb`
  ADD PRIMARY KEY (`conference_type`),
  ADD UNIQUE KEY `conference_type_2` (`conference_type`),
  ADD KEY `conference_type` (`conference_type`);

--
-- Indexes for table `confirmationletter`
--
ALTER TABLE `confirmationletter`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ConfirmationLetter` (`ID_number`);

--
-- Indexes for table `degree_bmb`
--
ALTER TABLE `degree_bmb`
  ADD KEY `degree` (`degree`);

--
-- Indexes for table `department_id_bmb`
--
ALTER TABLE `department_id_bmb`
  ADD KEY `Department_ID` (`Department_ID`);

--
-- Indexes for table `docu_type_bmb`
--
ALTER TABLE `docu_type_bmb`
  ADD PRIMARY KEY (`docu_type`);

--
-- Indexes for table `duty`
--
ALTER TABLE `duty`
  ADD KEY `Duty` (`Department_ID`),
  ADD KEY `Duty1` (`ID_number`),
  ADD KEY `job_name` (`job_name`);

--
-- Indexes for table `edu_bmb`
--
ALTER TABLE `edu_bmb`
  ADD PRIMARY KEY (`edu`);

--
-- Indexes for table `excellentyouth`
--
ALTER TABLE `excellentyouth`
  ADD KEY `ExcellentYouth` (`ID_number`);

--
-- Indexes for table `home_place_bmb`
--
ALTER TABLE `home_place_bmb`
  ADD PRIMARY KEY (`place`);

--
-- Indexes for table `job_name_bmb`
--
ALTER TABLE `job_name_bmb`
  ADD PRIMARY KEY (`Job_ID`);

--
-- Indexes for table `language_bmb`
--
ALTER TABLE `language_bmb`
  ADD PRIMARY KEY (`language`);

--
-- Indexes for table `major_bmb`
--
ALTER TABLE `major_bmb`
  ADD PRIMARY KEY (`major`);

--
-- Indexes for table `nation_bmb`
--
ALTER TABLE `nation_bmb`
  ADD PRIMARY KEY (`nation`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`Department_ID`),
  ADD KEY `组织机构ID` (`Department_ID`),
  ADD KEY `SJDepartment` (`SJDepartment`),
  ADD KEY `Department_ID` (`Department_ID`),
  ADD KEY `Department_ID_2` (`Department_ID`);

--
-- Indexes for table `ororp`
--
ALTER TABLE `ororp`
  ADD PRIMARY KEY (`Department_ID`),
  ADD KEY `ORorp` (`Department_ID`);

--
-- Indexes for table `participator`
--
ALTER TABLE `participator`
  ADD KEY `job_ID` (`job_ID`),
  ADD KEY `ID_number` (`ID_number`);

--
-- Indexes for table `personnelinformation`
--
ALTER TABLE `personnelinformation`
  ADD PRIMARY KEY (`ID_number`),
  ADD KEY `Department_ID` (`Department_ID`),
  ADD KEY `instructor_ID` (`instructor_ID`),
  ADD KEY `talker_ID` (`talker_ID`),
  ADD KEY `person_cate1` (`person_cate1`),
  ADD KEY `person_cate2` (`person_cate2`,`major`,`nation`),
  ADD KEY `politics_status` (`politics_status`,`language`,`edu`,`degree`),
  ADD KEY `nation` (`nation`),
  ADD KEY `native_place` (`native_place`,`Home_Add`,`police_station`),
  ADD KEY `Home_Add` (`Home_Add`),
  ADD KEY `police_station` (`police_station`),
  ADD KEY `language` (`language`),
  ADD KEY `personnelinformation_ibfk_11` (`major`),
  ADD KEY `personnelinformation_ibfk_13` (`edu`),
  ADD KEY `personnelinformation_ibfk_14` (`degree`);

--
-- Indexes for table `person_cate1_bmb`
--
ALTER TABLE `person_cate1_bmb`
  ADD PRIMARY KEY (`Person_cate1_`);

--
-- Indexes for table `person_cate2_bmb`
--
ALTER TABLE `person_cate2_bmb`
  ADD PRIMARY KEY (`person_cate2_`);

--
-- Indexes for table `pm_publicity`
--
ALTER TABLE `pm_publicity`
  ADD KEY `ID_number` (`ID_number`);

--
-- Indexes for table `polity_bmb`
--
ALTER TABLE `polity_bmb`
  ADD PRIMARY KEY (`politics_status`);

--
-- Indexes for table `ppm_publicity`
--
ALTER TABLE `ppm_publicity`
  ADD KEY `PPM_Publicity` (`ID_number`);

--
-- Indexes for table `rorp`
--
ALTER TABLE `rorp`
  ADD PRIMARY KEY (`reward_id`),
  ADD KEY `RorP` (`ID_number`);

--
-- Indexes for table `stage`
--
ALTER TABLE `stage`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Stage` (`ID_number`),
  ADD KEY `docu_type` (`docu_type`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`job_ID`),
  ADD KEY `Department_ID` (`Department_ID`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Train` (`ID_number`);

--
-- Indexes for table `unappearance`
--
ALTER TABLE `unappearance`
  ADD PRIMARY KEY (`Activity_ID`),
  ADD KEY `Activity_ID` (`Activity_ID`),
  ADD KEY `ID_number` (`ID_number`);

--
-- Indexes for table `unattend`
--
ALTER TABLE `unattend`
  ADD KEY `conference_ID` (`conference_ID`),
  ADD KEY `ID_number` (`ID_number`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_number`),
  ADD KEY `User` (`ID_number`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `activity`
--
ALTER TABLE `activity`
  MODIFY `Activity_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '活动ID';
--
-- 使用表AUTO_INCREMENT `appraisement`
--
ALTER TABLE `appraisement`
  MODIFY `appraisement_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `arrears`
--
ALTER TABLE `arrears`
  MODIFY `arrears_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `conference`
--
ALTER TABLE `conference`
  MODIFY `conference_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '会议ID', AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `confirmationletter`
--
ALTER TABLE `confirmationletter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `rorp`
--
ALTER TABLE `rorp`
  MODIFY `reward_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '奖惩主键';
--
-- 使用表AUTO_INCREMENT `stage`
--
ALTER TABLE `stage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- 使用表AUTO_INCREMENT `train`
--
ALTER TABLE `train`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- 限制导出的表
--

--
-- 限制表 `activist`
--
ALTER TABLE `activist`
  ADD CONSTRAINT `Person_ID_link_1` FOREIGN KEY (`ID_number`) REFERENCES `personnelinformation` (`ID_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Person_ID_link_7` FOREIGN KEY (`trainer1_ID`) REFERENCES `personnelinformation` (`ID_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Person_ID_link_8` FOREIGN KEY (`trainer1_ID`) REFERENCES `personnelinformation` (`ID_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `appraisement`
--
ALTER TABLE `appraisement`
  ADD CONSTRAINT `Person_ID_link_3` FOREIGN KEY (`ID_number`) REFERENCES `personnelinformation` (`ID_number`);

--
-- 限制表 `arrears`
--
ALTER TABLE `arrears`
  ADD CONSTRAINT `Person_ID_link_2` FOREIGN KEY (`ID_number`) REFERENCES `personnelinformation` (`ID_number`);

--
-- 限制表 `attend`
--
ALTER TABLE `attend`
  ADD CONSTRAINT `attend_ibfk_1` FOREIGN KEY (`conference_ID`) REFERENCES `conference` (`conference_ID`),
  ADD CONSTRAINT `attend_ibfk_2` FOREIGN KEY (`ID_number`) REFERENCES `personnelinformation` (`ID_number`);

--
-- 限制表 `conference`
--
ALTER TABLE `conference`
  ADD CONSTRAINT `conference_ibfk_1` FOREIGN KEY (`Department_ID`) REFERENCES `organization` (`Department_ID`),
  ADD CONSTRAINT `conference_ibfk_2` FOREIGN KEY (`conference_type`) REFERENCES `conference_type_bmb` (`conference_type`);

--
-- 限制表 `confirmationletter`
--
ALTER TABLE `confirmationletter`
  ADD CONSTRAINT `confirmationletter_ibfk_1` FOREIGN KEY (`ID_number`) REFERENCES `personnelinformation` (`ID_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `duty`
--
ALTER TABLE `duty`
  ADD CONSTRAINT `duty_ibfk_1` FOREIGN KEY (`Department_ID`) REFERENCES `organization` (`Department_ID`),
  ADD CONSTRAINT `duty_ibfk_2` FOREIGN KEY (`ID_number`) REFERENCES `personnelinformation` (`ID_number`),
  ADD CONSTRAINT `duty_ibfk_3` FOREIGN KEY (`job_name`) REFERENCES `job_name_bmb` (`Job_ID`);

--
-- 限制表 `excellentyouth`
--
ALTER TABLE `excellentyouth`
  ADD CONSTRAINT `excellentyouth_ibfk_1` FOREIGN KEY (`ID_number`) REFERENCES `personnelinformation` (`ID_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`SJDepartment`) REFERENCES `organization` (`Department_ID`);

--
-- 限制表 `ororp`
--
ALTER TABLE `ororp`
  ADD CONSTRAINT `ororp_ibfk_1` FOREIGN KEY (`Department_ID`) REFERENCES `organization` (`Department_ID`);

--
-- 限制表 `participator`
--
ALTER TABLE `participator`
  ADD CONSTRAINT `participator_ibfk_1` FOREIGN KEY (`job_ID`) REFERENCES `task` (`job_ID`),
  ADD CONSTRAINT `participator_ibfk_2` FOREIGN KEY (`ID_number`) REFERENCES `personnelinformation` (`ID_number`);

--
-- 限制表 `personnelinformation`
--
ALTER TABLE `personnelinformation`
  ADD CONSTRAINT `personnelinformation_ibfk_1` FOREIGN KEY (`person_cate1`) REFERENCES `person_cate1_bmb` (`Person_cate1_`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnelinformation_ibfk_10` FOREIGN KEY (`talker_ID`) REFERENCES `personnelinformation` (`ID_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnelinformation_ibfk_11` FOREIGN KEY (`major`) REFERENCES `major_bmb` (`major`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnelinformation_ibfk_12` FOREIGN KEY (`politics_status`) REFERENCES `polity_bmb` (`politics_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnelinformation_ibfk_13` FOREIGN KEY (`edu`) REFERENCES `edu_bmb` (`edu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnelinformation_ibfk_14` FOREIGN KEY (`degree`) REFERENCES `degree_bmb` (`degree`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnelinformation_ibfk_2` FOREIGN KEY (`person_cate2`) REFERENCES `person_cate2_bmb` (`person_cate2_`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnelinformation_ibfk_3` FOREIGN KEY (`nation`) REFERENCES `nation_bmb` (`nation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnelinformation_ibfk_7` FOREIGN KEY (`language`) REFERENCES `language_bmb` (`language`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnelinformation_ibfk_8` FOREIGN KEY (`instructor_ID`) REFERENCES `personnelinformation` (`ID_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personnelinformation_ibfk_9` FOREIGN KEY (`Department_ID`) REFERENCES `organization` (`Department_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `pm_publicity`
--
ALTER TABLE `pm_publicity`
  ADD CONSTRAINT `pm_publicity_ibfk_1` FOREIGN KEY (`ID_number`) REFERENCES `personnelinformation` (`ID_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `ppm_publicity`
--
ALTER TABLE `ppm_publicity`
  ADD CONSTRAINT `ppm_publicity_ibfk_1` FOREIGN KEY (`ID_number`) REFERENCES `personnelinformation` (`ID_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `rorp`
--
ALTER TABLE `rorp`
  ADD CONSTRAINT `Person_ID_link_4` FOREIGN KEY (`ID_number`) REFERENCES `personnelinformation` (`ID_number`);

--
-- 限制表 `stage`
--
ALTER TABLE `stage`
  ADD CONSTRAINT `Person_ID_link_6` FOREIGN KEY (`ID_number`) REFERENCES `personnelinformation` (`ID_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stage_ibfk_1` FOREIGN KEY (`docu_type`) REFERENCES `docu_type_bmb` (`docu_type`);

--
-- 限制表 `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`Department_ID`) REFERENCES `organization` (`Department_ID`);

--
-- 限制表 `train`
--
ALTER TABLE `train`
  ADD CONSTRAINT `train_ibfk_1` FOREIGN KEY (`ID_number`) REFERENCES `personnelinformation` (`ID_number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `unattend`
--
ALTER TABLE `unattend`
  ADD CONSTRAINT `unattend_ibfk_1` FOREIGN KEY (`conference_ID`) REFERENCES `conference` (`conference_ID`),
  ADD CONSTRAINT `unattend_ibfk_2` FOREIGN KEY (`ID_number`) REFERENCES `personnelinformation` (`ID_number`);

--
-- 限制表 `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`ID_number`) REFERENCES `personnelinformation` (`ID_number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
