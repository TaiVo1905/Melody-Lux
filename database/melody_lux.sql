create database Melody_Lux character set utf8mb4 collate utf8mb4_unicode_ci;
set sql_safe_updates = 0;
use Melody_Lux;

-- Tạo bảng backgrond 
create table Backgrounds (
	background_id int primary key auto_increment,
    path varchar(250) not null
);

create table Users (
	user_id int primary key auto_increment,
    email varchar(50) not null unique,
    password varchar(50),
    user_name varchar(100) not null,
    user_img varchar(250),
    background_id int,
    role int(1)  CHECK (role IN (0, 1)),
    foreign key (background_id) references Backgrounds(background_id)
);

create table Categories (
	category_id int primary key auto_increment,
    category varchar(50) not null unique,
    description varchar(250)
);

create table Author_Singers (
	author_singer_id int primary key auto_increment,
	author_singer_name varchar(100) not null
);

create table Albums (
	album_id int primary key auto_increment,
    album_name varchar(100) not null,
    quantity int not null check(quantity >= 0),
    datetime datetime,
    album_img varchar(250)
);

create table Songs (
	song_id int primary key auto_increment,
    song_name varchar(80) not null,
    path_audio varchar(250) not null,
    path_img varchar(250) not null,
    plays int default 0 check (plays >= 0), 
    album_id int,
    category_id int not null,
    author_id int not null,
    user_id int not null,
    foreign key (album_id) references Albums (album_id) ON DELETE SET NULL,
    foreign key (category_id) references Categories (category_id),
    foreign key (author_id) references Author_Singers (author_singer_id),
    foreign key (user_id) references Users (user_id)
);

create table Current_Songs (
	user_id int not null,
    song_id int,
    current_song_time time,
    song_repeat boolean,
    song_random boolean,
    primary key (user_id),
    foreign key (user_id) references Users(user_id) ON DELETE CASCADE,
    foreign key (song_id) references Songs(song_id)
);

create table Playlists (
	playlist_id int primary key auto_increment,
    playlist_name varchar(50) not null,
    user_id int not null, 
    foreign key (user_id) references Users(user_id) ON DELETE CASCADE
);

create table Playlist_Details (
	playlist_id int,
    song_id int,
    primary key (playlist_id, song_id),
    foreign key (playlist_id) references Playlists(playlist_id) ON DELETE CASCADE,
    foreign key (song_id) references Songs(song_id) ON DELETE CASCADE
);

create table Song_Singers (
	song_id int,
    singer_id int,
    primary key (song_id, singer_id),
    foreign key (song_id) references Songs(song_id) ON DELETE CASCADE,
    foreign key (singer_id) references Author_Singers (author_singer_id) ON DELETE CASCADE
);

create table Album_Singers (
	album_id int,
    singer_id int,
    primary key (album_id, singer_id),
    foreign key (album_id) references Albums(album_id) ON DELETE CASCADE, 
    foreign key (singer_id) references Author_Singers (author_singer_id) ON DELETE CASCADE
);

create table Album_Libraries (
	album_id int not null,
    user_id int not null,
    primary key (album_id, user_id),
    foreign key (album_id) references Albums(album_id) ON DELETE CASCADE ,
    foreign key (user_id) references Users (user_id) ON DELETE CASCADE
);

create table Song_Libraries(
	song_id int not null,
    user_id int not null,
    primary key (song_id, user_id),
    foreign key (song_id) references Songs(song_id) ON DELETE CASCADE,
    foreign key (user_id) references Users (user_id) ON DELETE CASCADE
);

-- currents songs khi nào user nghe mới insert
create trigger insertCurrentSong after insert
	on Users
	for each row
	insert into Current_Songs values (new.user_id, null, null, null, null);
    
-- insert vào bảng bacground trước (giả sử ở đây sẽ có 5 backgrounds)
INSERT INTO backgrounds (path)
VALUES
  ('./public/images/backgrounds/background1.jpg'),
  ('./public/images/backgrounds/background2.jpg'),
  ('./public/images/backgrounds/background3.jpg'),
  ('./public/images/backgrounds/background4.jpg'),
  ('./public/images/backgrounds/background5.jpg');
  
-- insert vào bảng user
INSERT INTO users (email, password, user_name, user_img, background_id, role)
VALUES
  ('congdoan0806@gmail.com', 'melody0806', 'Công Đoàn', 'CongDoan.jpg',1, 1),
  ('voductaitxqt123@gmail.com', 'melodylux1905', 'Đức Tài', 'DucTai.jpg', 2, 0),
  ('tramh7879@gmail.com', 'luxury0101', 'Mai Trâm', 'MaiTram.jpg', 3, 1);

-- insert vào bảng author-singers
INSERT INTO author_singers (author_singer_name)
VALUES
	('Hồ Gia Hưng'),
    ('Hồ Quang Hiếu'),
    ('Phan Mạnh Quỳnh'),
    ('Trịnh Thiên An'),
    ('Quách Beem'),
    ('Chu Bin'),
    ('Đức Phát'),
    ('Lâm Chánh Khang'),
    ('Hoài Lâm'),
    ('Sơn Tùng MTP'),
    ('Duong G'),
    ('RAYO'),
    ('Khánh Phương'),
    ('Phát Huy T4'),
    ('Jack'),
    ('Hoàng Dũng'),
    ('Ngô Lan Hương'),
    ('Lê Bảo Bình'),
    ('ANDIEZ'),
    ('BITIS HUNTER'),
    ('Phương Anh'),
    ('Đan Nguyên'),
    ('Dương Hồng Loan'),
    ('Chu Thúy Quỳnh'),
    ('Chillies'),
    ('Như Quỳnh'),
    ('Quang Lê'),
    ('Huỳnh Văn'),
    ('Nguyễn Qúy Cao Nguyên'), 
    ('Nguyễn Văn Chung'),
    ('DC Tâm'),
    ('Andiez'),
    ('Sông Trà'),
    ('An Bằng'),
    ('Thái Thịnh'),
    ('Trần Quang Lộc'), 
    ('Lê Minh Bằng'),
    ('Hoai Linh'),
    ('Nhật Ngân');

-- inser vào bảng albums
INSERT INTO albums (album_name, quantity, datetime, album_img) 
VALUES 
	('Những ca khúc V-POP mới cập nhật bạn phải nghe', 2, '2024-11-17 08:00:00', './public/images/albums/album1.jpg'),
	('Những ca khúc V-POP đã "gây bão"', 2, '2024-11-18 09:30:00', './public/images/albums/album2.jpg'),
    ('Lên kế hoạch tuần kèm theo vài ca khúc V-POP', 2, '2024-11-18 09:30:00', './public/images/albums/album3.jpg'),
    ('Nhạc hot chọn lọc dành riêng cho bạn!', 3, '2024-11-18 09:30:00', './public/images/albums/album4.jpg'),
    ('Những ca khúc V-POP nghe một lần là mê', 5, '2024-11-18 09:30:00', './public/images/albums/album5.jpg'),
    ('Thả mình vào dòng chảy giai điệu cực chill', 2, '2024-11-17 08:00:00', './public/images/albums/album6.jpg'),
	('Không âu lo muộn phiền, một ngày êm đềm trôi', 2, '2024-11-18 09:30:00', './public/images/albums/album7.jpg'),
    ('Khi những bản nhạc cũ làm mới đầy thi vị', 2, '2024-11-18 09:30:00', './public/images/albums/album8.jpg'),
    ('Thả mình vào giai điệu lofi chill nghe là nghiện', 1, '2024-11-18 09:30:00', './public/images/albums/album9.jpg'),
    ('Lắng nghe giai điệu nhạc Hoa lời Việt nhẹ nhàng', 1, '2024-11-18 09:30:00', './public/images/albums/album10.jpg'),
    ('Bolero Ngôi Sao Trẻ', 3, '2024-11-17 08:00:00', './public/images/albums/album11.jpg'),
	('Bolero mới nhất', 1, '2024-11-18 09:30:00', './public/images/albums/album12.jpg'),
    ('Bolero hay nhất', 2, '2024-11-18 09:30:00', './public/images/albums/album13.jpg'),
    ('Trữ tình việt nổi bật', 2, '2024-11-18 09:30:00', './public/images/albums/album14.jpg'),
    ('Nhạc quê hương hôm nay', 3, '2024-11-18 09:30:00', './public/images/albums/album15.jpg'),
	('EDM Now', 0, '2024-11-17 08:00:00', './public/images/albums/album16.jpg'),
	('Đỉnh cao EDM', 0, '2024-11-18 09:30:00', './public/images/albums/album17.jpg'),
    ('Today EDM Hits', 0, '2024-11-18 09:30:00', './public/images/albums/album18.jpg'),
    ('EDM Việt Gây Nghiện', 0, '2024-11-18 09:30:00', './public/images/albums/album19.jpg'),
    ('EDM With Female Vocal', 0, '2024-11-18 09:30:00', './public/images/albums/album20.jpg');

insert into Album_Singers values
	(1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5);

-- Insert vào bảng categories
INSERT INTO categories (category, description) 
VALUES 
('Nhạc tình cảm', 'Bật speed up lên'),
('Nhạc Trẻ', 'Nhạc trẻ thịnh hành'),
('EDM','Nhạc trẻ remix'),
('Bolero & Trữ Tình','Những bản nhạc nhẹ nhàng');

-- insert vào bảng playlist
INSERT INTO playlists (playlist_name, user_id)
VALUES 
  ('Playlist của Công Đoàn', 1),
  ('Playlist của tình yêu màu nắng', 2),
  ('Playlist đón tết', 3);

-- Insert bài hát vào bảng songs
INSERT INTO songs (song_name, path_audio, path_img, album_id, category_id, author_id, user_id)
VALUES
		  ('Thay thế', './public/audio/ThayThe-HoGiaHungHKT-5308924.mp3', './public/images/singers/hoGiaHung.jpg', 1, 2, 1, 2),
		  ('Khóc cho đấng sinh thành', './public/audio/KhocChoDangSinhThanhThieuNienRaGiangHoOST-HoQuangHieu-5533643.mp3', './public/images/singers/hoQuangHieu.jpg', 2, 2, 2, 2),
		  ('Nước ngoài', './public/audio/nuocNgoai.m4a', './public/images/singers/phanManhQuynh.jpg', 3, 2, 3, 2),
		  ('Khi yêu nào đâu ai muốn', './public/audio/KhiYeuNaoDauAiMuon-TrinhThienAn-7624200.mp3', './public/images/singers/trinhThienAn.jpg', 4, 2, 3, 2),
		  ('Hà giang ơi', './public/audio/HaGiangOi-QuachBeem-6260097.mp3', './public/images/singers/quachBeem.jpg', 5, 2, 5, 2),
		  ('Giả vờ thương anh có được không', './public/audio/GiaVoThuongAnhDuocKhong-ChuBin-4858628.mp3', './public/images/singers/chuBin.jpg', 6, 2, 6, 2),
		  ('Đơn giản anh yêu em', './public/audio/DonGianAnhYeuEm-DucPhat-7857286.mp3', './public/images/singers/ducPhat.jpg', 7, 2, 5, 2),
		  ('Đời là thế thôi', './public/audio/DoiLaTheThoi-QuachBeem_4cmjg.mp3', './public/images/singers/quachBeem.jpg', 8, 2, 5, 2),
		  ('Điếu thuốc tàn', './public/audio/DieuThuocTanNguoiTrongGiangHo6OST-LamChanKhang-5488925.mp3', './public/images/singers/lamChanhKhang.jpg',9 , 2, 6, 2),
		  ('Cô đơn trong nhà mình', './public/audio/CÔ ĐƠN TRONG NHÀ MÌNH  HOÀI LÂM.mp3', './public/images/singers/hoaiLam.jpg', 10, 2, 7, 2),
		  ('Cha', 'public/audio/Cha-QuachBeem-6283468.mp3', './public/images/singers/quachBeem.jpg', 11, 1, 5, 2),
		  ('3107-2', './public/audio/3107-2 - DuongG, Nâu, Wn x CaoTri.mp3', './public/images/songs/3107-2.jpg', 1, 2, 29, 2),
		  ('Đừng Làm Trái Tim Anh Đau','./public/audio/Đừng làm trái tim anh đau - Sơn Tùng M-TP.mp3','./public/images/songs/dung lam trai tim anh dau.jpg', 5, 2, 10, 1),
          ('Cẩm Tú Cầu','./public/audio/Cẩm Tú Cầu  RAYO x HUỲNH VĂN.mp3','./public/images/songs/cam tu cau.jpg', 2, 2,28, 2),
          ('Chiếc Khăn Gió Âm','./public/audio/Chiếc Khăn Gió Ấm  Khánh Phương  Official Music Video.mp3','./public/images/songs/chiec khan gio am.jpg', 3, 2, 30, 3),
          ('Chúng Ta Của Tương Lai','./public/audio/Chúng Ta Của Tương Lai - Sơn Tùng M-TP.mp3','./public/images/songs/chung ta cua tuong lai.jpg', 5, 2, 10, 1),
          ('Chúng Ta Không Thuộc Về Nhau Remix','./public/audio/Chúng Ta Không Thuộc Về Nhau Remix.mp3','./public/images/songs/chung ta khong thuoc ve nhau.jpg', 5, 2, 10, 1),
          ('Đoạn Tuyệt Nàng Đi ','./public/audio/Đoạn Tuyệt Nàng Đi - PHÁT HUY T4.mp3','./public/images/songs/doan tuyet nang di.jpg', 4, 2, 14,2),
          ('Hồng Nhan','./public/Hồng Nhan - Jack (G5R).mp3','./public/images/songs/hong nhan.jpg', 15, 3, 15, 1),
          ('Nàng Thơ','./public/audio/Nàng Thơ - Hoàng Dũng  OFFICIAL.mp3','./public/images/songs/nang tho.jpg', 4, 1, 16, 3),
          ('Đi Giữa Trời Rực Rỡ','./public/audio/Đi Giữa Trời Rực Rỡ - Ngô Lan Hương (MV Lyrics).mp3','./public/images/songs/di giưa troi ruc ro.jpg', 5, 1, 17, 3),
          ('Nơi Vực Nơi Trời','./public/audio/NƠI VỰC NƠI TRỜI - LÊ BẢO BÌNH ft V.A REMIX .mp3','./public/images/songs/noi vuc noi troi.jpg', 6, 2, 31, 2),
          ('Suýt Nữa Thì','./public/audio/SUÝT NỮA THÌ  ANDIEZ x BITIS HUNTER  LYRIC VIDEO.mp3','./public/images/songs/suyt nua thi.jpg', 7, 1, 32, 2),
          ('Chiều Sân Ga','./public/audio/Chiều Sân Ga - Phương Anh (Official MV).mp3','./public/images/songs/chieu san ga.jpg', 11, 4, 33, 2),
          ('Chuyện Hoa Sim','./public/audio/Chuyện Hoa Sim - Đan Nguyên [OFFICIAL MV].mp3','./public/images/songs/chuyen hoa sim.jpg', 11, 4, 34, 2),
          ('Duyên Phận','./public/audio/Duyên Phận  Dương Hồng Loan.mp3','./public/images/songs/duyen phan.jpg', 14, 4, 35, 2),
          ('Thương Ly Biệt','./public/audio/Thương Ly Biệt.mp3','./public/images/songs/thuong ly biet.jpg', 8, 2, 24 , 2),
          ('Và Thế Là Hết','./public/audio/Và Thế Là Hết - Chillies (Original).mp3','./public/images/songs/va the la het.jpg', 10, 2, 25, 3),
          ('Vùng Lá Me Bay','./public/audio/Như Quỳnh - Vùng Lá Me Bay (Anh Việt Thanh).mp3','./public/images/songs/vung la me bay.jpg', 13, 4, 36, 2),
          ('Cô Hàng Xóm','./public/audio/PBN 72  Quang Lê - Cô Hàng Xóm.mp3','./public/images/songs/co hang xom.jpg', 12, 4, 37, 2),
          ('Về Đâu Mái Tóc Người Thương','./public/audio/Về Đâu Mái Tóc Người Thương - Quang Lê.mp3','./public/images/songs/', 13, 4, 38, 2),
          ('Xuân Này Con Về Mẹ Ở Đâu','./public/audio/Quang Lê - Xuân Này Con Về Mẹ Ở Đâu_ (Nhật Ngân) PBN 76.mp3','./public/images/songs/', 14, 4, 39, 2);
  


insert into Song_Singers values
	(1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6),
    (7, 7),
    (8, 8),
    (12, 11),
    (13, 10),
    (14, 28),
    (15, 13),
    (16, 10),
    (17, 10),
    (18, 14),
    (19, 15),
    (20, 16),
    (21, 17),
    (22, 18),
    (23, 19),
    (24, 21),
    (25, 22),
    (26, 23),
    (27, 24),
    (28, 25),
    (29, 26),
    (30, 27),
    (31, 27),
    (32, 27);
    
insert into Playlist_Details values
	(1, 1), (1, 2), (1, 3), (2, 4), (2, 5), (2, 6);


insert into Song_Libraries values
	(1, 1), (2, 1), (3, 1),
    (4, 2), (5, 2), (6, 2);
    
insert into Album_Libraries values
	(1, 1),
    (2, 2);