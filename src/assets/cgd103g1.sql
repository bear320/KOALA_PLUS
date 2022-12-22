SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE DATABASE `tibamefe_cgd103g1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tibamefe_cgd103g1`;


-- 會員
CREATE TABLE member (
mem_id int unsigned NOT NULL AUTO_INCREMENT COMMENT '會員編號', 
mem_name varchar(100) NOT NULL DEFAULT '' COMMENT '名字', 
mem_account varchar(100) NOT NULL DEFAULT '' COMMENT 'Email / 帳號', 
mem_psw varchar(20) NOT NULL DEFAULT '' COMMENT '密碼', 
mem_mob varchar(10) NOT NULL DEFAULT '' COMMENT '手機', 
mem_add varchar(300) NOT NULL DEFAULT '' COMMENT '地址', 
ord_sum int NOT NULL DEFAULT '0' COMMENT '商城消費總額', 
support_sum int NOT NULL DEFAULT '0' COMMENT '資助認養總額', 
mem_exp int NOT NULL DEFAULT '0' COMMENT '無尾熊經驗值', 
mem_point int NOT NULL DEFAULT '0' COMMENT '點數總額',
mem_food1 int NOT NULL DEFAULT '0' COMMENT '商品1', 
mem_food2 int NOT NULL DEFAULT '0' COMMENT '商品2', 
mem_food3 int NOT NULL DEFAULT '0' COMMENT '商品3', 
mem_food4 int NOT NULL DEFAULT '0' COMMENT '商品4', 
mem_food5 int NOT NULL DEFAULT '0' COMMENT '商品5', 
mem_food6 int NOT NULL DEFAULT '0' COMMENT '商品6', 
mem_validation tinyint NOT NULL DEFAULT '0' COMMENT 'email驗證(0:未驗證,1:已驗證)', 
mem_state tinyint NOT NULL DEFAULT '0' COMMENT '會員狀態(0:正常,1:黑名單)', 
PRIMARY KEY (`mem_id`), 
KEY dx_mem_name (`mem_name`), 
KEY dx_mem_account (`mem_account`), 
KEY dx_mem_psw (`mem_psw`), 
KEY dx_mem_mob (`mem_mob`), 
KEY dx_mem_add (`mem_add`), 
KEY dx_ord_sum (`ord_sum`), 
KEY dx_support_sum (`support_sum`), 
KEY dx_mem_exp (`mem_exp`),
KEY dx_mem_point (`mem_point`), 
KEY dx_mem_food1 (`mem_food1`), 
KEY dx_mem_food2 (`mem_food2`), 
KEY dx_mem_food3 (`mem_food3`), 
KEY dx_mem_food4 (`mem_food4`), 
KEY dx_mem_food5 (`mem_food5`), 
KEY dx_mem_food6 (`mem_food6`), 
KEY dx_mem_validation (`mem_validation`),
KEY dx_mem_state (`mem_state`)
) ENGINE=InnoDB AUTO_INCREMENT=01001 DEFAULT CHARSET=utf8mb4 COMMENT='會員表';
INSERT INTO `tibamefe_cgd103g1`.`member` (`mem_name`, `mem_account`, `mem_psw`, `mem_mob`, `mem_add`, `ord_sum`, `support_sum`, `mem_exp`, `mem_point`, `mem_food1`, `mem_food2`, `mem_food3`, `mem_food4`, `mem_food5`, `mem_food6`, `mem_validation`, `mem_state`) VALUES 
('曾韋翰', 'charmy111@gmail.com', 'charmy111', '0911111111', '桃園市復興路46號1樓', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0'),
('徐志摩', 'charmy222@gmail.com', 'charmy222', '0922222222', '桃園市復興路46號2樓', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0'),
('劉以豪3', 'charmy333@gmail.com', 'charmy333', '0933333333', '桃園市復興路46號3樓', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0'),
('PUA大師', 'charmy444@gmail.com', 'charmy444', '0944444444', '桃園市復興路46號4樓', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '1'),
('羅志祥3', 'charmy555@gmail.com', 'charmy555', '0955555555', '桃園市復興路46號5樓', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1'),
('中壢渣難', 'charmy666@gmail.com', 'charmy666', '0966666666', '桃園市復興路46號6樓', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0'),
('王壢宏3', 'charmy777@gmail.com', 'charmy777', '0977777777', '桃園市復興路46號7樓', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0'),
('蕭勁疼', 'charmy888@gmail.com', 'charmy888', '0988888888', '桃園市復興路46號8樓', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0'),
('陳之藩', 'charmy999@gmail.com', 'charmy999', '0999999999', '桃園市復興路46號9樓', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0'),
('緯育李白', 'charmy101@gmail.com', 'charmy101', '0901111111', '桃園市復興路46號10樓', '0', '0', '0', '9999', '10', '10', '10', '10', '10', '10', '1', '0'),
('曾自輕3', 'charmy102@gmail.com', 'charmy102', '0902222222', '桃園市復興路46號11樓', '0', '0', '100', '9999', '10', '10', '10', '10', '10', '10', '1', '0'),
('徐以豪3', 'charmy103@gmail.com', 'charmy103', '0903333333', '桃園市復興路46號8樓', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0'),
('曾以豪', 'charmy104@gmail.com', 'charmy104', '0904444444', '桃園市復興路46號8樓', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0'),
('陳志祥', 'charmy105@gmail.com', 'charmy105', '0905555555', '桃園市復興路46號9樓', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0'),
('蕭勁疼', 'charmy106@gmail.com', 'charmy106', '0906666666', '桃園市復興路46號8樓', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0'),
('徐壢宏', 'charmy107@gmail.com', 'charmy107', '0907777777', '桃園市復興路46號8樓', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0'),
('劉中壢', 'charmy108@gmail.com', 'charmy108', '0908888888', '桃園市復興路46號8樓', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0'),
('陳大師', 'charmy109@gmail.com', 'charmy109', '0909999999', '桃園市復興路46號9樓', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0'),
('羅勁白', 'charmy201@gmail.com', 'charmy201', '0900111111', '桃園市復興路46號8樓', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0'),
('陳宏白', 'charmy202@gmail.com', 'charmy202', '0900222222', '桃園市復興路46號9樓', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0');

-- 無尾熊
CREATE TABLE `koala`(
koala_id int unsigned NOT NULL AUTO_INCREMENT COMMENT '無尾熊編號',
koala_name varchar(100) NOT NULL DEFAULT '' COMMENT '無尾熊名字',
koala_dob date NOT NULL DEFAULT '2022-12-25' COMMENT '無尾熊生日',
koala_sex varchar(10) NOT NULL DEFAULT '' COMMENT '無尾熊性別(Female/Male)',
koala_info varchar(250) NOT NULL DEFAULT '' COMMENT '簡介',
koala_listed tinyint NOT NULL DEFAULT '0' COMMENT '無尾熊狀態(0:未上架,1:上架)',
koala_sum int NOT NULL DEFAULT '0' COMMENT '資助認養總金額',
koala_sum_this_month int NOT NULL DEFAULT '0' COMMENT '本月資助認養金額',
koala_sum_last_month int NOT NULL DEFAULT '0' COMMENT '上月資助認養金額',
koala_sum_the_month_before_last int NOT NULL DEFAULT '0' COMMENT '上上月資助認養金額',
koala_img1 varchar(50) NOT NULL DEFAULT '' COMMENT '無尾熊1圖片路徑', 
koala_img2 varchar(50) DEFAULT '' COMMENT '無尾熊2圖片路徑', 
koala_img3 varchar(50) DEFAULT '' COMMENT '無尾熊3圖片路徑', 
koala_img4 varchar(50) DEFAULT '' COMMENT '無尾熊4圖片路徑', 
PRIMARY KEY (`koala_id`), 
KEY dx_koala_name (`koala_name`), 
KEY dx_koala_dob (`koala_dob`), 
KEY dx_koala_sex (`koala_sex`), 
KEY dx_koala_info (`koala_info`),
KEY dx_koala_listed (`koala_listed`),
KEY dx_koala_sum (`koala_sum`),
KEY dx_koala_sum_this_month (`koala_sum_this_month`),
KEY dx_koala_sum_last_month (`koala_sum_last_month`),
KEY dx_koala_sum_the_month_before_last (`koala_sum_the_month_before_last`),
KEY dx_koala_img1 (`koala_img1`),
KEY dx_koala_img2 (`koala_img2`),
KEY dx_koala_img3 (`koala_img3`),
KEY dx_koala_img4 (`koala_img4`)
)ENGINE=InnoDB AUTO_INCREMENT=02001 DEFAULT CHARSET=utf8mb4 COMMENT='無尾熊管理';
INSERT INTO `tibamefe_cgd103g1`.`koala` ( `koala_name`, `koala_dob`, `koala_sex`, `koala_info`, `koala_listed`, `koala_sum`, `koala_img1`, `koala_img2`, `koala_img3`, `koala_img4`) VALUES 
('All', '', 'Male', '資助所有無尾熊', '0', '0', 'All.jpg', '', '', ''),
('Zeus', '2017-09-14', 'Male', '嗨～我是 Zeus，我是一個小孤兒，被討人厭的烏鴉追趕後在森林中被發現，我很想念我的媽媽，但是照顧我的飼養員們都很有愛心，我在他們的照顧下感到非常安全，也很幸運可以 24 小時被喂食（但我的飼養員就沒那麼幸運了！）；最近，我的新興趣是看著飼養員及遊客們走來走去，我覺得非常地有趣！', '1', '0', 'Zeus-1.jpg', 'Zeus-2.jpg', 'Zeus-3.jpg', 'Zeus-4.jpg'),
('Hera', '2018-03-29', 'Female', '嗨～我是 Hera，在我進入 KOALA+ 之前是在森林中生活，但由於 2020 年的森林大火，我失去了我的家園和同伴們，且視力也受到了影響，因此我成為 KOALA+ 的永久居民，非常感謝園區裡的飼養員和護理人員對我的仔細照顧；最近，我和 Aphrodite 成為了好朋友，多虧了她讓我的生活變得更精彩！', '1', '0', 'Hera-1.jpg', 'Hera-2.jpg', 'Hera-3.jpg', 'Hera-4.jpg'),
('Poseidon', '2017-10-26', 'Male', '哈囉～我的名字是 Poseidon，遭汽車撞擊後被一位建築工人拯救，並將我送至 KOALA+，現在我的身體大致上都好了，雖然行動上多少還是有點不方便，但這毫不影響我的帥氣，看看我的人氣就知道，園區內許多無尾熊和遊客都十分喜歡我！', '1', '0', 'Poseidon-1.jpg', 'Poseidon-2.jpg', 'Poseidon-3.jpg', 'Poseidon-4.jpg'),
('Ares', '2020-11-18', 'Male', '嗨～我是 Ares，原本生活在澳洲的森林中，最喜歡在樹林間爬來爬去，但有一天森林發生了大火，火勢迅速蔓延我也受困其中，但在消防隊員的協助下，我被送至 KOALA+，在這裡我遇到許多新朋友，一起吃飯、一起睡覺、一起玩耍，也受到了良好的醫療照顧，真的很感謝所有幫助過我的人！', '1', '0', 'Ares-1.jpg', 'Ares-2.jpg', 'Ares-3.jpg', 'Ares-4.jpg'),
('Aphrodite', '2019-06-10', 'Female', '大家好～我是 Aphrodite！我是因為受到一隻澳洲犬的襲擊受傷而被送入 KOALA+ 的，我真的覺得我很倒霉，我明明就只是像平常一樣在路上走路而已，莫名其妙就被襲擊，不過好在當下有人經過救下了我；我現在在園區當中也過得很好，因為我再也不會碰到討厭的澳洲犬了，也在這邊結交了一些好朋友，不用在外面辛苦討生活了！', '1', '0', 'Aphrodite-1.jpg', 'Aphrodite-2.jpg', 'Aphrodite-3.jpg', 'Aphrodite-4.jpg'),
('Apollo', '2018-10-25', 'Male', '哈囉～我叫做 Appllo，我因為生了一種病，所以年紀很小的時候就被送到園區裡接受治療了，所以我幾乎沒有太多在野外生活的經驗；園區裡面的每個人都對我非常好，且在醫護人員的照顧下，我的身體也還維持在一個不錯的狀況，希望有一天我能夠完全康復，並且能夠出去看看外面的世界！', '1', '0', 'Apollo-1.jpg', 'Apollo-2.jpg', 'Apollo-3.jpg', 'Apollo-4.jpg'),
('Athena', '2018-08-15', 'Female', '大家好，我是 Athena，2019 年時我在城市中一條繁忙的街道上被發現，因為附近沒有合適的棲息地，因此我被送到了 KOALA+；雖然剛到的時候我有點適應不良，但經過一段時間後，我現在已經完全適應了園區中的生活了！', '1', '0', 'Athena-1.jpg', 'Athena-2.jpg', 'Athena-3.jpg', 'Athena-4.jpg'),
('Hermes', '2021-03-31', 'Male', '嗨～我是 Hermes，因為之前居住的環境遭受破壞而來到了 KOALA+，雖然我不是自願來到這裡的，但既來之則安之，我覺得現在的生活也沒有什麼不好，硬要說的話就是有時候遊客太多、太吵了，打擾到我睡覺了，所以我現在都喜歡爬到最高的樹上睡覺，比較不會受到影響！', '1', '0', 'Hermes-1.jpg', 'Hermes-2.jpg', 'Hermes-3.jpg', 'Hermes-4.jpg');


-- 資助認養
CREATE TABLE `support`(
sup_id int unsigned NOT NULL AUTO_INCREMENT COMMENT '資助認養編號',
mem_id int unsigned NOT NULL COMMENT '會員編號',
sup_date date NOT NULL DEFAULT '2022-12-25' COMMENT '資助認養時間',
koala_id int unsigned NOT NULL COMMENT '無尾熊編號',
sup_plan tinyint NOT NULL DEFAULT '0' COMMENT '資助認養方案(0: 認養,1: 資助)',
sup_price int NOT NULL DEFAULT '0' COMMENT '資助認養金額', 
sup_note varchar(500) COMMENT '無尾熊備註',
PRIMARY KEY (`sup_id`), 
FOREIGN KEY (`mem_id`) REFERENCES member(`mem_id`),
FOREIGN KEY(`koala_id`) REFERENCES koala(`koala_id`),
KEY dx_sup_date (`sup_date`), 
KEY dx_sup_plan (`sup_plan`), 
KEY dx_sup_price (`sup_price`), 
KEY dx_sup_note (`sup_note`)
)ENGINE=InnoDB AUTO_INCREMENT=03001 DEFAULT CHARSET=utf8mb4 COMMENT='資助認養紀錄';
INSERT INTO `tibamefe_cgd103g1`.`support` ( `mem_id`, `sup_date`, `koala_id`, `sup_plan`, `sup_price`,`sup_note` ) VALUES 
('01001', '2022-07-01', '02001', '1', '300', ''),
('01002', '2022-07-02', '02001', '1', '300', ''),
('01003', '2022-08-01', '02002', '0', '1000', ''),
('01004', '2022-08-02', '02003', '0', '1000', ''),
('01005', '2022-09-01', '02004', '0', '1000', ''),
('01006', '2022-10-01', '02005', '0', '1000', ''),
('01007', '2022-11-01', '02006', '0', '1000', ''),
('01008', '2022-11-02', '02007', '0', '1000', ''),
('01009', '2022-12-01', '02008', '0', '1000', ''),
('01010', '2022-12-02', '02009', '0', '1000', ''),
('01011', '2022-12-15', '02002', '0', '1000', ''),
('01001', '2022-12-16', '02001', '1', '300', '');


-- 優惠券
CREATE TABLE `coupon`(
`coupon_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '優惠券編號',
`coupon_name` varchar(50) NOT NULL DEFAULT '' COMMENT '優惠券名稱',
`coupon_code` varchar(50) NOT NULL DEFAULT '' COMMENT '優惠券代碼',
`coupon_valid` int NOT NULL DEFAULT '0' COMMENT '使用天數',
`coupon_discount` DECIMAL(3,2) unsigned NOT NULL DEFAULT'0' COMMENT '折扣數',
PRIMARY KEY (`coupon_id`), 
KEY `dx_coupon_name` (`coupon_name`), 
KEY `dx_coupon_code` (`coupon_code`), 
KEY `dx_coupon_valid` (`coupon_valid`), 
KEY `dx_coupon_discount` (`coupon_discount`)
)ENGINE=InnoDB AUTO_INCREMENT=04001 DEFAULT CHARSET=utf8mb4 COMMENT='優惠券';
INSERT INTO `tibamefe_cgd103g1`.`coupon` ( `coupon_name`, `coupon_code`, `coupon_valid`, `coupon_discount`) VALUES 
('85折優惠券', 'koala85', '60', '0.85'),
('9折優惠券', 'koala90', '60', '0.90'),
('95折優惠券', 'koala95', '60', '0.95'),
('6折優惠券', 'koala60', '365', '0.60');


-- 我的優惠券
CREATE TABLE `my_coupon`(
`mem_id` int unsigned NOT NULL COMMENT '會員編號', 
`coupon_id` int unsigned NOT NULL COMMENT '優惠券編號',
`coupon_code` varchar(50) NOT NULL DEFAULT '' COMMENT '優惠券代碼',
`coupon_get_date` date NOT NULL DEFAULT '2022-12-01' COMMENT '獲得日期', 
`coupon_exp_date` date NOT NULL DEFAULT '2022-12-31' COMMENT '使用期限',
`coupon_status` tinyint NOT NULL DEFAULT '0' COMMENT '優惠券狀態(0: 未使用,1: 已使用)',
PRIMARY KEY (`mem_id`, `coupon_id`), 
FOREIGN KEY (`mem_id`) REFERENCES member(`mem_id`),
FOREIGN KEY(`coupon_id`) REFERENCES coupon(`coupon_id`),
KEY `dx_coupon_code` (`coupon_code`), 
KEY `dx_coupon_get_date` (`coupon_get_date`), 
KEY `dx_coupon_exp_date` (`coupon_exp_date`), 
KEY `dx_coupon_status` (`coupon_status`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='我的優惠券';
INSERT INTO `tibamefe_cgd103g1`.`my_coupon` ( `mem_id`,`coupon_id`, `coupon_code`, `coupon_get_date`, `coupon_exp_date`,`coupon_status`) VALUES 
('1001', '4001', 'koala85', '2022-12-20', '2023-02-20', '0'),
('1001', '4002', 'koala90', '2022-12-23', '2023-02-23', '0'),
('1001', '4003', 'koala95', '2022-12-08', '2023-02-08', '0'),
('1002', '4002', 'koala90', '2022-12-20', '2023-02-20', '0'),
('1002', '4003', 'koala95', '2022-12-22', '2023-02-22', '0'),
('1003', '4003', 'koala95', '2022-12-20', '2023-02-20', '0'),
('1004', '4004', 'koala60', '2022-12-25', '2023-02-25', '0');


-- 給佳政參考的php指令
-- $coupRow["valid"]
-- $days = 30;
-- $sql = "SELECT ADDDATE(current_date(), INTERVAL {$coupRow["valid"]} DAY)"
-- SELECT ADDDATE(current_date(), INTERVAL 30 DAY)


-- 周邊商品
CREATE TABLE `product`(
`prod_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '商品編號',
`prod_name` varchar(200) NOT NULL DEFAULT '' COMMENT '商品名稱',
`prod_price` int NOT NULL DEFAULT '0' COMMENT '商品價格',
`prod_info` varchar(1000) NOT NULL DEFAULT '' COMMENT '商品描述',
`prod_listed` tinyint NOT NULL DEFAULT '0' COMMENT '商品狀態(0:下架,1:上架)',
`prod_category` varchar(50) NOT NULL DEFAULT '' COMMENT '商品類別(生活小物、玩具/絨毛娃娃、服飾)',
`prod_img1` varchar(50) NOT NULL DEFAULT '' COMMENT '商品圖片1路徑', 
`prod_img2` varchar(50) DEFAULT '' COMMENT '商品圖片2路徑', 
`prod_img3` varchar(50) DEFAULT '' COMMENT '商品圖片3路徑', 
`prod_img4` varchar(50) DEFAULT '' COMMENT '商品圖片4路徑', 
PRIMARY KEY (`prod_id`), 
KEY `dx_prod_name` (`prod_name`),
KEY `dx_prod_price` (`prod_price`),
KEY `dx_prod_info` (`prod_info`), 
KEY `dx_prod_listed` (`prod_listed`),
KEY `dx_prod_category` (`prod_category`), 
KEY `dx_prod_img1` (`prod_img1`),
KEY `dx_prod_img2` (`prod_img2`), 
KEY `dx_prod_img3` (`prod_img3`),
KEY `dx_prod_img4` (`prod_img4`)
)ENGINE=InnoDB AUTO_INCREMENT=05001 DEFAULT CHARSET=utf8mb4 COMMENT='商品';
INSERT INTO `tibamefe_cgd103g1`.`product` (`prod_name`, `prod_price`, `prod_info`, `prod_listed`,`prod_category`,`prod_img1`,`prod_img2`,`prod_img3`,`prod_img4`) VALUES 
('無尾熊造型披巾', '300', '洗滌後穿戴著就能順吸速乾，超細纖維毛，吸水超快速，高於棉的3.3倍吸水力，材質柔軟，觸感舒適，大人孩皆可用!一起變身可愛無尾熊', '1','daily','prod1-1.jpg','prod1-2.jpg','prod1-3.jpg','prod1-4.jpg'),
('無尾熊拖鞋', '900', '想要搭配無尾熊圖案居家裝的居家鞋，採用蓬鬆、輕盈、柔軟的baby moco材料製成，輕盈如羽的針織，盡顯純粹溫柔，為孩子而生。全家人都能享受的居家裝系列配飾，配有可愛的無尾熊毛絨玩具。立體的耳朵和鼻子是房間鞋的亮點，蓬鬆的質地非常適合初秋。', '1','daily','prod2-1.jpg','prod2-2.jpg','prod2-3.jpg','prod2-4.jpg'),
('無尾熊化妝包', '1100', '小巧的設計讓這款化妝包方便攜帶，適合日常使用、出差、旅行等。雖是小巧的化妝盒，卻有6個收納袋，眼影、口紅、腮紅等各類化妝品可以整齊地分開存放，我們有從深色到亮色的多種顏色變化。外出、出差或旅行時，您也可以將它與衣服搭配。盡顯奢華，推薦用於聖誕節、情人節、週年紀念日、生日，以及作為對自己的獎勵。高品質的材料和簡單的設計使其成為任何年齡段的人都可以使用的化妝包。', '1','daily','prod3-1.jpg','prod3-2.jpg','prod3-3.jpg','prod3-4.jpg'),
('無尾熊存錢筒', '700', '無尾熊、中國大陸無尾熊和香港無尾熊是澳大利亞特有的有袋動物。無尾熊天生懶惰、嗜睡，所以它們看起來很可愛，也喜歡待在身邊。這款由日本設計師設計的無尾熊存錢罐無論是爪子還是毛皮設計都充滿活力。抱手的動作更是可愛。可以插上長長的樹枝或鮮花放在桌上，像抱無尾熊一樣，舒緩又好看！它的底部有一個小孔，脖子上有一個小標籤。可以寫個名字給你的無尾熊起個名字', '1','daily','prod4-1.jpg','prod4-2.jpg','prod4-3.jpg','prod4-4.jpg'),
('無尾熊馬克杯', '1000', '日本三大名陶，最具代表性的產地，純淨溫馨的風格，獨特、清新、優雅，優質、安全、無毒，日常用餐首選，日本進口品質保證，餐具檢驗合格，體驗日常生活和溫暖調皮的動物，與無尾熊在一起，你可以吃一頓美餐。想睡覺，閉上眼睛隨時入眠，這是我的懶惰日常！杯子外側的每一面都有不同的圖案，觀察圖案的細節非常生動有趣。', '1','daily','prod5-1.jpg','prod5-2.jpg','prod5-3.jpg','prod5-4.jpg'),
('無尾熊鉛筆盒', '1400', '這款輕巧易攜帶的筆袋適合上學、出差、旅行等，不會增加您的行李負擔。這款小袋有一個網袋和一個小口袋，可以存放大量小物件，如文具、計算器、橡皮、便利貼、剪刀、尺子、尺子和修正帶。', '1','daily','prod6-1.jpg','prod6-2.jpg','prod6-3.jpg','prod6-4.jpg'),
('無尾熊地毯', '800', '無尾熊形狀的人造羊皮地毯由優質長絨柔軟人造毛皮製成，具有最佳手感和触感，極致耐用和奢華舒適。黑色、白色和灰色毛絨地毯用途廣泛，適用於客廳、宿舍、遊戲室、餐廳、公寓、家庭辦公室、書房、寵物屋，形狀柔軟蓬鬆的粗毛具有防滑背襯和耐磨底部的柔軟絨面革襯裡。非常耐用，非常適合您家中最繁忙的區域。', '1','daily','prod7-1.jpg','prod7-2.jpg','prod7-3.jpg','prod7-4.jpg'),
('無尾熊造型T-1', '600', '全家人都能享受的居家裝系列，順滑的面料，厚度恰到好處。質地柔軟順滑，從秋季到早春都可以穿。以柔軟細膩的手感繪製的毛絨無尾熊為特色。無尾熊造型T採用男女通用設計，推薦作為禮物送人。厚度適中的光滑面料使用方便，可以一直穿到早春。可與同款褲子成套穿著。LADIES、KIDS、BABY 有相同的圖案，每個人都可以享受搭配的樂趣。', '1','apparel','prod8-1.jpg','prod8-2.jpg','prod8-3.jpg','prod8-4.jpg'), 
('無尾熊造型毛衣', '1800', '全家人都可以和可愛的睡著的無尾熊一起享受的居室裝系列。套頭衫採用 baby moco 材質，手感輕盈蓬鬆。款式相同的居服和配飾有女裝、童裝和嬰兒裝，可以一家人一起穿。此外，它與同季的baby moko melange border pattern 室內裝扮也很搭。', '1','apparel','prod9-1.jpg','prod9-2.jpg','prod9-3.jpg','prod9-4.jpg'),
('無尾熊造型T-2', '1500', '全家人都能享受的居家裝系列，順滑的面料，厚度恰到好處。質地柔軟順滑，從秋季到早春都可以穿。以柔軟細膩的手感繪製的毛絨無尾熊為特色。無尾熊造型T採用男女通用設計，推薦作為禮物送人。厚度適中的光滑面料使用方便，可以一直穿到早春。可與同款褲子成套穿著。LADIES、KIDS、BABY 有相同的圖案，每個人都可以享受搭配的樂趣。', '1','apparel','prod10-1.jpg','prod10-2.jpg','prod10-3.jpg',''),
('無尾熊造型T-3', '1200', '全家人都能享受的居家裝系列，順滑的面料，厚度恰到好處。質地柔軟順滑，從秋季到早春都可以穿。以柔軟細膩的手感繪製的毛絨無尾熊為特色。無尾熊造型T採用男女通用設計，推薦作為禮物送人。厚度適中的光滑面料使用方便，可以一直穿到早春。可與同款褲子成套穿著。LADIES、KIDS、BABY 有相同的圖案，每個人都可以享受搭配的樂趣。', '1','apparel','prod11-1.jpg','prod11-2.jpg','prod11-3.jpg',''),
('無尾熊娃娃-黑', '500', '無尾熊毛絨玩具由 ppcotton 材料製成，經久耐用。無尾熊毛絨玩具採用毛絨工藝製作，這款公仔具有無尾熊的外觀，是送給孩子的紀念品。無尾熊毛絨玩具可以放在任何地方。適用於家庭、辦公室、汽車和櫥櫃裝飾。優雅和藝術氣息，非常適合家庭和辦公室裝飾。你的心情會很愉快。本產品可以放置在任何地方。適用於家庭、辦公室、汽車和櫥櫃裝飾。', '1','doll','prod12-1.jpg','prod12-2.jpg','prod12-3.jpg','prod12-4.jpg'),
('無尾熊娃娃-白', '500', '無尾熊毛絨玩具由 ppcotton 材料製成，經久耐用。無尾熊毛絨玩具採用毛絨工藝製作，這款公仔具有無尾熊的外觀，是送給孩子的紀念品。無尾熊毛絨玩具可以放在任何地方。適用於家庭、辦公室、汽車和櫥櫃裝飾。優雅和藝術氣息，非常適合家庭和辦公室裝飾。你的心情會很愉快。本產品可以放置在任何地方。適用於家庭、辦公室、汽車和櫥櫃裝飾。', '1','doll','prod13-1.jpg','prod13-2.jpg','prod13-3.jpg','prod13-4.jpg'),
('無尾熊大娃娃', '1300', '適用於臥室、客廳、家庭、辦公室等。辦公室枕頭：下班後放鬆身心給孩子和朋友的好禮物：正在尋找購買禮物的靈感？隨時帶回家。這將是您最好的購買之一。這款無尾熊動物玩具是很棒的生日、聖誕節或情人節禮物。您的孩子和朋友會喜歡這種毛絨玩具，因為它真的很可愛。可愛逼真的無尾熊可以與您或您的朋友一起度過孤獨的時光。你所有的壞情緒和工作壓力都會消失！當您不在或您的孩子不開心時，可以幫助您的孩子感到放鬆和快樂。', '1','doll','prod14-1.jpg','prod14-2.jpg','prod14-3.jpg','prod14-4.jpg');

-- 購物車
CREATE TABLE `cart`(
mem_id int unsigned NOT NULL COMMENT '會員編號',
prod_id int unsigned NOT NULL COMMENT '商品編號',
cart_qty int unsigned NOT NULL COMMENT '商品數量',
PRIMARY KEY (`mem_id`, `prod_id`), 
FOREIGN KEY (`mem_id`) REFERENCES member(`mem_id`),
FOREIGN KEY(`prod_id`) REFERENCES product(`prod_id`),
KEY cart_qty (`cart_qty`)
)ENGINE=InnoDB CHARSET=utf8mb4 COMMENT='購物車';
INSERT INTO tibamefe_cgd103g1 . `cart`(`mem_id`,`prod_id`,`cart_qty`) VALUES
('1001', '5001', '2'), 
('1001', '5002', '5');

-- 預約導覽
CREATE TABLE `reservation`(
`rsv_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '預約編號',
`rsv_date` date NOT NULL DEFAULT '2022-12-01' COMMENT '預約日期',
`rsv_ppl` int unsigned COMMENT '預約人數',
`rsv_name` varchar(100) NOT NULL DEFAULT '' COMMENT '預約者',
`rsv_mobile` varchar(20) DEFAULT '' COMMENT '預約者手機號碼',
`rsv_email` varchar(100) DEFAULT '' COMMENT '預約者電子信箱',
`rsv_status` varchar(20) NOT NULL DEFAULT '已預約' COMMENT '預約狀態(休館,已預約)',
`rsv_ps` varchar(100) DEFAULT '' COMMENT '備註',
PRIMARY KEY (`rsv_id`), 
KEY `dx_rsv_date` (`rsv_date`), 
KEY `dx_rsv_ppl` (`rsv_ppl`), 
KEY `dx_rsv_name` (`rsv_name`), 
KEY `dx_rsv_mobile` (`rsv_mobile`), 
KEY `dx_rsv_email` (`rsv_email`), 
KEY `dx_rsv_status` (`rsv_status`), 
KEY `dx_rsv_ps` (`rsv_ps`)
)ENGINE=InnoDB AUTO_INCREMENT=06001 DEFAULT CHARSET=utf8mb4 COMMENT='導覽預約';
INSERT INTO `tibamefe_cgd103g1`.`reservation` ( `rsv_date`, `rsv_ppl`,  `rsv_name`, `rsv_mobile`,`rsv_email`,`rsv_status`,`rsv_ps`) VALUES 
( '2022-12-08', '12', 'Handsome', '0911222333','handsome@gmail.com','已預約','預約導覽Handsome'),
( '2022-12-16', '16', 'Sara', '0988168168','sara168@gmail.com','已預約','預約導覽Sara'),
( '2022-12-19', '0', 'koala+', '','','休館','休館日'),
( '2022-12-22', '8', 'Amy', '0908188188','amy188@gmail.com','已預約',''),
( '2022-12-31', '0', 'koala+', '','','休館','跨年'),
( '2023-01-01', '0', 'koala+', '','','休館','元旦'),
( '2023-01-06', '8', 'Iris', '0908134123','iris111@gmail.com','已預約','');


-- 公告
CREATE TABLE `news`(
`news_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '公告編號',
`news_img` varchar(50) DEFAULT '' COMMENT '公告圖片', 
`news_title` varchar(100) NOT NULL DEFAULT '' COMMENT '公告標題',
`news_content` varchar(500) NOT NULL DEFAULT '' COMMENT '公告內容',
`news_date` date NOT NULL DEFAULT '2022-12-01' COMMENT '公告發佈日期',
`news_category` varchar(50) NOT NULL DEFAULT '' COMMENT '公告分類(最新消息、資金運用、園區資訊)',
`news_status` tinyint NOT NULL DEFAULT '0' COMMENT '公告狀態(0:草稿,1:已上架)',
`news_star` tinyint NOT NULL DEFAULT '0' COMMENT '公告星星(0:普通,1:主要)',
PRIMARY KEY (`news_id`), 
KEY `dx_news_img` (`news_img`), 
KEY `dx_news_title` (`news_title`), 
KEY `dx_news_content` (`news_content`), 
KEY `dx_news_date` (`news_date`), 
KEY `dx_news_category` (`news_category`), 
KEY `dx_news_status` (`news_status`), 
KEY `dx_news_star` (`news_star`)
)ENGINE=InnoDB AUTO_INCREMENT=07001 DEFAULT CHARSET=utf8mb4 COMMENT='公告';
INSERT INTO `tibamefe_cgd103g1`.`news` (`news_img`, `news_title`, `news_content`, `news_date`, `news_category`, `news_status`, `news_star`) VALUES
('3.jpg', '一隻無尾熊寶寶出生了', '每年的9到11月是無尾熊開始繁殖的交配季節，當無尾熊長到2歲時就開始邁入性成熟年齡、可以進行傳宗接代的重責大任。無尾熊平均一胎以孕育一隻baby為主，偶爾會有雙胞胎出現，平均壽命為10至12歲。為了迎接三隻無尾熊寶寶誕生，園區特別精心打造了育嬰房，為讓無尾熊媽媽可以安心照護baby，園區特別將無尾熊一館打造成無尾熊育嬰房兼坐月子中心。此外，考量育嬰需求，動物保母也會特別多採集一些尤加利樹嫩葉為無尾熊媽媽「加菜」，使母體具備足夠營養，讓無尾熊baby長得頭好壯壯。除精心打造育嬰房讓無尾熊寶寶安心成長外，由於這是動物園首次有三隻無尾熊baby接連出生，為讓大眾分享新生命誕生的喜悅，園區也特別舉辦「無尾熊新生兒命名票選活動」，讓喜歡無尾熊的民眾可以透過票選方式選出心中最喜歡的名字，最後票選結果將於一月底公布，屆時三隻無尾熊寶寶就會以民眾選出的新名字跟大家歡喜亮相。', '2022-11-29', '最新消息', '1', '1'),
('8.jpg', '園區公休通知', '因應園區大清潔及設施維修工程，KOALA+園區將於112/02/15~112/02/20公休6日，造成不便盡請見諒。', '2022-12-03', '園區資訊', '1', '0'),
('6.jpg', '關於日前收到的大筆捐款', '日前，KOALA+收到一筆大筆的捐款，十分感謝。這筆捐款將為全園區的無尾熊進行健康檢查，以及森林環境勘查及保育，當地居民也全力支持與配合這項活動，非常感謝各位捐款人，您的支持是我們提供無尾熊保育的最大動力。', '2022-12-11', '資金運用', '1', '0');

-- 管理者
CREATE TABLE `employee`(
`emp_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '管理員編號',
`emp_account` varchar(100)  NOT NULL DEFAULT '' COMMENT '管理員帳號',
`emp_psw` varchar(20) NOT NULL DEFAULT '' COMMENT '管理員密碼',
`emp_name` varchar(100) NOT NULL DEFAULT '' COMMENT '管理員姓名',
`emp_validation` tinyint NOT NULL DEFAULT '0' COMMENT '管理員帳號狀態(0:停用,1:啟用)',
`emp_last_login` datetime NOT NULL DEFAULT '2022-12-01 10:00:00' COMMENT '管理員最後登入',
PRIMARY KEY (`emp_id`), 
KEY `dx_emp_account` (`emp_account`), 
KEY `dx_emp_psw` (`emp_psw`), 
KEY `dx_emp_name` (`emp_name`), 
KEY `dx_emp_validation` (`emp_validation`), 
KEY `dx_emp_last_login` (`emp_last_login`)
)ENGINE=InnoDB AUTO_INCREMENT=08001 DEFAULT CHARSET=utf8mb4 COMMENT='管理員資料';
INSERT INTO tibamefe_cgd103g1 . `employee`(`emp_account`,`emp_psw`,`emp_name`,`emp_validation`,`emp_last_login`) VALUES
('Sara', '1234', '董董', '1','2022-12-01 10:00:00'),
('Charmy', '1234', '韋翰','1','2022-12-01 10:00:00'),
('Bear', '1234', '熊熊','1','2022-12-01 10:00:00'),
('Nate', '1234', '品儒','0','2022-12-01 10:00:00'),
('Eric', '1234', '子皓','0','2022-12-01 10:00:00');


-- 商品訂單
CREATE TABLE `orders`(
`ord_id` int unsigned NOT NULL AUTO_INCREMENT COMMENT '訂單編號',
`mem_id` int unsigned NOT NULL COMMENT '會員編號',
`coupon_id` int unsigned COMMENT '優惠券編號',
`ord_date` date NOT NULL DEFAULT '2022-12-01' COMMENT '訂單成立日期',
`ord_sum` int unsigned NOT NULL COMMENT '商城消費總額',
`ord_disc` int unsigned NOT NULL COMMENT '折扣金額',
`ord_pay` int unsigned NOT NULL COMMENT '實際金額',
`ord_person` varchar(20) COMMENT '收件人',
`ord_phone` varchar(10) NOT NULL COMMENT '收件人電話', 
`ord_add` varchar(300) COMMENT '收件地址',
`ord_ship` tinyint NOT NULL DEFAULT '0' COMMENT '訂單處理狀況(0: 訂單準備中, 1: 訂單已出貨, 2: 訂單已完成, 3: 訂單未完成)',
PRIMARY KEY (`ord_id`), 
FOREIGN KEY (`mem_id`) REFERENCES member(`mem_id`),
FOREIGN KEY(`coupon_id`) REFERENCES my_coupon(`coupon_id`),
KEY `dx_ord_date` (`ord_date`), 
KEY `dx_ord_sum` (`ord_sum`), 
KEY `dx_ord_disc` (`ord_disc`), 
KEY `dx_ord_pay` (`ord_pay`),
KEY `dx_ord_person` (`ord_person`), 
KEY `dx_ord_phone` (`ord_phone`), 
KEY `dx_ord_add` (`ord_add`), 
KEY `dx_ord_ship` (`ord_ship`)
)ENGINE=InnoDB AUTO_INCREMENT=09001 DEFAULT CHARSET=utf8mb4 COMMENT='商品訂單';
INSERT INTO tibamefe_cgd103g1 . `orders`(`mem_id`, `coupon_id`, `ord_date`, `ord_sum`, `ord_disc`, `ord_pay`, `ord_person`, `ord_phone`, `ord_add`, `ord_ship`) VALUES
('1001', '4001', '2022-10-01', '2400', '360', '2040', '曾韋翰', '0911111111', '桃園市復興路46號1樓', '3'),
('1002', '4002', '2022-11-30', '1100', '110', '990', '徐志摩', '0922222222', '桃園市復興路46號2樓', '2'),
('1003', '4003', '2022-12-10', '5100', '255', '4845', '劉以豪', '0933333333', '桃園市復興路46號3樓', '1'),
('1003', '4004', '2022-12-16', '2200', '880', '1320', 'PUA大師', '0944444444', '桃園市復興路46號4樓', '0');


-- 商品訂單詳情
CREATE TABLE `order_list`(
`ord_id` int unsigned NOT NULL COMMENT '訂單編號',
`prod_id` int unsigned NOT NULL COMMENT '商品編號',
`ord_qty` int unsigned NOT NULL COMMENT '商品數量',
`prod_price` int unsigned NOT NULL COMMENT '商品單價',
PRIMARY KEY (`ord_id`, `prod_id`), 
FOREIGN KEY (`ord_id`) REFERENCES orders(`ord_id`),
FOREIGN KEY(`prod_id`) REFERENCES product(`prod_id`),
KEY `dx_ord_qty` (`ord_qty`),
KEY `prod_price` (`prod_price`)
)ENGINE=InnoDB CHARSET=utf8mb4 COMMENT='訂單項目明細';
INSERT INTO tibamefe_cgd103g1 . `order_list`(`ord_id`, `prod_id`, `ord_qty`, `prod_price`) VALUES
('09001', '5001', '2', '300'), 
('09001', '5002', '2', '900'),
('09002', '5003', '1', '1100'),
('09003', '5004', '1', '700'),
('09003', '5005', '3', '1000'),
('09003', '5006', '1', '1400'),
('09004', '5007', '2', '800'),
('09004', '5008', '1', '600');

-- update 資助認養總金額
UPDATE koala
SET koala_sum = (SELECT SUM(sup_price)
                 FROM support
                 WHERE koala.koala_id = support.koala_id);

-- update 本月資助認養金額
UPDATE koala
SET koala_sum_this_month = (SELECT IFNULL(SUM(sup_price), 0)
                            FROM support
                            WHERE MONTH(sup_date) = MONTH(CURRENT_DATE) AND koala.koala_id = support.koala_id);

-- update 上月資助認養金額
UPDATE koala
SET koala_sum_last_month = (SELECT IFNULL(SUM(sup_price), 0)
                            FROM support
                            WHERE YEAR(sup_date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(sup_date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) AND koala.koala_id = support.koala_id);

-- update 上上月資助認養金額
UPDATE koala
SET koala_sum_the_month_before_last = (SELECT IFNULL(SUM(sup_price), 0)
                                       FROM support
                                       WHERE YEAR(sup_date) = YEAR(CURRENT_DATE - INTERVAL 2 MONTH) AND MONTH(sup_date) = MONTH(CURRENT_DATE - INTERVAL 2 MONTH) AND koala.koala_id = support.koala_id);