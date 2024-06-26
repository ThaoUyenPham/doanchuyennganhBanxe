 CREATE TABLE ql_banhang.DANHMUC(MaDM int AUTO_INCREMENT,
 TenSP nvarchar(50),img nvarchar(50),primary key (MaDM));

 CREATE TABLE ql_banhang.SANPHAM(MaSP int AUTO_INCREMENT, TenSP nvarchar(50),
 MADM int, img nvarchar(50),SLSP int,GIA varchar(10),NGAYSX datetime, constraint PK_SP primary key (MaSP),
 FOREIGN KEY (MADM) REFERENCES ql_banhang.danhmuc(MADM));

CREATE TABLE ql_banhang.GIOHANG(MaG int AUTO_INCREMENT,Hinh nvarchar(50),maSP int,tenSP nvarchar(200),soluong int,gia int,
IPAddress varchar(10),MaKH int,primary key (MaG),
 FOREIGN KEY (maSP) REFERENCES ql_banhang.sanpham(MaSP));

 CREATE TABLE ql_banhang.KHACHHANG(MaKH int AUTO_INCREMENT,username nvarchar(100),tenkh varchar(50),
 Matkhau varchar(10),Diachi nvarchar(50),Sodienthoai varchar(10), primary key (MaKH));

 CREATE TABLE ql_banhang.HOADON (MaHD int AUTO_INCREMENT,TenKH nvarchar(100),
DiaChi nvarchar(100),Sodienthoai varchar(10),Email varchar(50),
primary key (MaHD));

create table ql_banhang.CTHD(MaCTHD int(10)AUTO_INCREMENT,SoLuong int,TongTien double,MaSP int,MaHD int,
primary key (MaCTHD), 
FOREIGN KEY (MaSP) REFERENCES ql_banhang.sanpham(MaSP),
FOREIGN KEY (MaHD) REFERENCES ql_banhang.HOADON(MaHD));

select * from ql_banhang.hoadon;
select * from ql_banhang.cthd;

--  CREATE TABLE ql_banhang.KHUYENMAI (MaKM int  AUTO_INCREMENT,TenKM nvarchar(50),NgayBD datetime,NgayKT datetime,
-- primary key (MaKM));

-- DANH MỤC
insert into ql_banhang.DANHMUC(TenSP,img) values (N'HONDA',('tttl/img/sh125i.png'));
insert into ql_banhang.DANHMUC(TenSP,img) values (N'YAMAHA',('tttl/img/janus.jpg'));
insert into ql_banhang.DANHMUC(TenSP,img) values (N'Piaggio',('tttl/img/Piaggio-Medley.png'));
insert into ql_banhang.DANHMUC(TenSP,img) values (N'Suzuki',('tttl/img/AXELO125.jpg'));
insert into ql_banhang.DANHMUC(TenSP,img) values (N'Sym',('tttl/img/Sym-Tus.png'));
select * from ql_banhang.danhmuc;

-- SẢN PHẨM
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Hoda Wave Alpha',1,5,'2560000','2023/5/10','tttl/img/wave-alpha.png');
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Honda Vario',1,10,'3860000','2023/5/10','tttl/img/vario.png');
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Hoda Vision',1,5,'3060000','2023/5/10','tttl/img/vision.png');
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Honda Super Cup',1,5,'5026000','2023/5/10','tttl/img/SPCUP.png');
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Honda SH125i',1,5,'7265000','2023/5/10','tttl/img/sh125i.png');
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Sym Angela',5,5,'2560000','2023/10/10','tttl/img/Sym-Angela.png');
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Sym Star',5,15,'3560000','2023/11/10','tttl/img/Sym-Star.jpg');
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Sym Tuscany',5,15,'3460000','2023/11/10','tttl/img/Sym-Tus.png');
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Suzuki Raider',4,15,'3860000','2023/11/10','tttl/img/Raider.png');
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Suzuki HAYATE',4,15,'3160000','2023/11/10','tttl/img/HAYATE125.jpg');
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Suzuki AXELO',4,15,'3260000','2023/11/10','tttl/img/AXELO125.jpg');
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Piaggio Janus',3,15,'3060000','2023/11/10','tttl/img/janus.jpg');
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Piaggio LATTE',3,15,'3360000','2023/11/10','tttl/img/latte.png');
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Piaggio Medley',3,15,'3060090','2023/11/10','tttl/img/Piaggio-Medley.png');
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Piaggo Liberty',3,15,'3060050','2023/11/10','tttl/img/Piaggo-Liberty.png');
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'YAMAHA Sirus-FI',2,15,'3160000','2023/11/10','tttl/img/Sirus-FI.png');
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'YAMAHA Sirus',2,15,'21600000','2023/11/10','tttl/img/Sirius.png');
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'YAMAHA Exciter',2,15,'3160000','2023/11/10','tttl/img/Exciter.jpg');

-- TRANG CHỦ
insert into ql_banhang.TRANGCHU(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Piaggio Medley',3,5,'3560060','2023/5/10','tttl/img/Piaggio-Medley.png');
insert into ql_banhang.TRANGCHU(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'YAMAHA Sirus-FI',2,10,'3860060','2023/5/10','tttl/img/Sirus-FI.png');
insert into ql_banhang.TRANGCHU(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'YAMAHA Exciter',2,5,'3063000','2023/5/10','tttl/img/Exciter.jpg');
insert into ql_banhang.TRANGCHU(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Piaggio Janus',3,5,'526000','2023/5/10','tttl/img/janus.jpg');
insert into ql_banhang.TRANGCHU(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Sym-Tus.png',5,5,'526000','2023/5/10','tttl/img/Sym-Tus.png');
insert into ql_banhang.TRANGCHU(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Honda SH125i',1,5,'7560030','2023/10/10','tttl/img/sh125i.png');
insert into ql_banhang.TRANGCHU(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Honda Vario',1,15,'3560050','2023/11/10','tttl/img/vario.png');
insert into ql_banhang.TRANGCHU(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'Hoda Wave Alpha',1,15,'2460050','2023/11/10','tttl/img/wave-alpha.png');

 insert into ql_banhang.KHACHHANG(username,tenkh,Matkhau,Diachi,Sodienthoai) values ('thinh13@gmail.com','thinh','Thinh@123',N'Tiền giang','0123456789');

insert into ql_banhang.hoadon(MaKH,THANHTIEN) values('1','320000');


 insert into ql_banhang.cthd(MaSP,SL,MaHD,DonGia) values('7','1','1','320000');
 select * from ql_banhang.giohang;
select MaSP,dm.TenSP,sp.TenSP,sp.img,SLSP,GIA from ql_banhang.sanpham sp, ql_banhang.danhmuc dm where MaSP=1 and dm.MaDM=sp.MADM;
 
 delete from ql_banhang.giohang where MaG='4';
 update ql_banhang.sanpham set TenSP='',MADM='',img='',SLSP=2,GIA=3 where MaG='5';
 delete from ql_banhang.giohang where MaG='1';

UPDATE ql_banhang.sanpham AS sp
SET sp.SLSP = sp.SLSP - (
    SELECT SUM(gh.soluong)
    FROM ql_banhang.giohang AS gh
    WHERE gh.maSP = sp.maSP
)
WHERE sp.maSP = '17' AND EXISTS (
    SELECT 1
    FROM ql_banhang.giohang AS gh
    WHERE gh.maSP = sp.maSP
);
select * from ql_banhang.sanpham;
select * from ql_banhang.giohang;
select * from ql_banhang.hoadon;
select * from ql_banhang.cthd;

 
insert into ql_banhang.SANPHAM(TenSP,MADM,SLSP,GIA,NGAYSX,img) values (N'YAMAHA Exciter 2',2,15,'31600006','2023/11/10','tttl/img/Exciter.jpg');
delete from ql_banhang.sanpham where TenSP='YAMAHA Exciter 2';

select * from ql_banhang.khachhang where username='thinh13@gmail.com';
update ql_banhang.khachhang set Matkhau='Uyenpmtt@1303',username='thaouyenpham0103@gmail.com' where MaKH='3'

