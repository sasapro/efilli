# Efilli Script Loader WordPress Plugin

Bu WordPress plugin'i, Efilli script'ini sitenizin head bölümüne otomatik olarak ekler.

## Özellikler

- Efilli script'ini WordPress sitenizin head bölümüne otomatik ekleme
- Güvenli kod yapısı (ABSPATH kontrolü)
- WordPress standartlarına uygun plugin yapısı
- Aktivasyon/deaktivasyon hook'ları
- Admin bildirimleri

## Kurulum

### Manuel Kurulum

1. `efilli-script-loader.php` dosyasını WordPress sitenizin `/wp-content/plugins/efilli-script-loader/` klasörüne yükleyin
2. WordPress admin panelinde **Eklentiler** > **Yüklü Eklentiler** bölümüne gidin
3. **Efilli Script Loader** eklentisini bulun ve **Etkinleştir** butonuna tıklayın

### FTP ile Kurulum

1. `efilli-script-loader.php` dosyasını FTP ile `/wp-content/plugins/efilli-script-loader/` klasörüne yükleyin
2. WordPress admin panelinde eklentiyi etkinleştirin

## Kullanım

Plugin etkinleştirildikten sonra, Efilli script'i otomatik olarak sitenizin tüm sayfalarının head bölümüne eklenir. Herhangi bir ek ayar yapmanıza gerek yoktur.

## Nasıl Çalışır

Plugin, `add_efilli_script_to_head()` fonksiyonunu kullanarak:

1. Sitenizin URL'sini alır
2. `https://` protokolünü kaldırır
3. Efilli bundle URL'sini oluşturur: `https://bundles.efilli.com/[site-url].prod.js`
4. Script tag'ini WordPress'in `wp_head` hook'una ekler

## Güvenlik

- Plugin, doğrudan dosya erişimini engeller
- `esc_attr()` fonksiyonu ile çıktı güvenliği sağlanır
- WordPress standart güvenlik uygulamaları kullanılır

## Gereksinimler

- WordPress 5.0 veya üzeri
- PHP 7.0 veya üzeri

## Destek

Herhangi bir sorun yaşarsanız veya yardıma ihtiyacınız olursa, lütfen Efilli destek ekibi ile iletişime geçin.

## Lisans

Bu plugin GPL v2 veya üzeri lisansı altında dağıtılmaktadır.

## Sürüm Geçmişi

### 1.0.0
- İlk sürüm
- Temel Efilli script yükleme özelliği
- WordPress standartlarına uygun yapı 