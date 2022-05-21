# 1102_SAD_GoGoABCD

## 額外軟體安裝
- [ghostscript](https://www.ghostscript.com/releases/gsdnld.html)
  - PDF 轉圖片(用在電子書)
  - windows 請載 **Ghostscript 9.56.1 for Windows (64 bit)** 左邊的 **Ghostscript AGPL Release**

## 每次 pull 之後
```
composer install
npm run dev
php artisan migrate
```

## 執行一次的命令
```
php artisan db:seed --class=DatabaseSeeder
```