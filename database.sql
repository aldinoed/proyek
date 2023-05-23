-- CREATE TABLE IF NOT EXISTS barang(
--   id_barang INTEGER NOT NULL PRIMARY KEY,
--   nama_barang VARCHAR(30) NOT NULL,
--   jumlah INTEGER NOT NULL, 
--   kategori VARCHAR(30) NOT NULL
-- );

-- CREATE TABLE IF NOT EXISTS user(
--   id_user VARCHAR(10) PRIMARY KEY,
--   nama VARCHAR(255) NOT NULL,
--   username VARCHAR(35) NOT NULL,
--   password VARCHAR(9) NOT NULL,
--   role VARCHAR(10) NOT NULL
-- );

-- This script was generated by the ERD tool in pgAdmin 4.
-- Please log an issue at https://redmine.postgresql.org/projects/pgadmin4/issues/new if you find any bugs, including reproduction steps.
CREATE TABLE IF NOT EXISTS public.barang
(
    id_barang VARCHAR(255) PRIMARY KEY,
    image_barang BLOB NOT NULL,
    nama_barang VARCHAR(255) NOT NULL,
    jumlah integer NOT NULL,
    kategori  VARCHAR(255) NOT NULL,
);

CREATE TABLE IF NOT EXISTS public."user"
(
    id_user VARCHAR(255) PRIMARY KEY,
    nama_user VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    user_role VARCHAR(255) NOT NULL,
);