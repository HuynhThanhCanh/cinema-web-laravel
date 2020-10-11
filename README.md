**Lưu ý 1:** Tạo 1 folder trống có tên là **cinema-web-laravel**(giống tên repo) trong folder **www** của Laragon và dùng SourceTree clone về folder đó nhé.

# HƯỚNG DẪN CÀI ĐẶT PROJECT SAU KHI CLONE VỀ LOCAL
1. Duplicate file **.env.example** và đổi tên file thành **.env**.
2. Bật Laragon và nhấn nút **Start all**.
3. Nhấn nút **Terminal** và trỏ đường dẫn đến thư mục chứa project vừa mới clone về.
   ```sh 
   Nó có cấu trúc tương tự như dòng này: **E:\Laragon\www\cinema-web-laravel (master)** 
   ```
4. Chạy lần lượt 2 dòng lệnh bên dưới
   ```sh
   **composer install**
   và
   **php artisan key:generate**
   ```
5. Quay lại giao diện chính của Laragon, click chuột phải -> www -> cinema-web-laravel để chạy project

**Lưu ý 2:** Xóa folder **vendor** trước khi push source lên git.

# QUAN TRỌNG: 
## 1. KHÔNG ĐƯỢC PUSH TRƯC TIẾP VÀO MASTER
## 2. TẠO 1 BRANCH CÓ TÊN GIỐNG VỚI TÊN TASK MÀ MÌNH ĐANG LÀM: CODE TRÊN BRANCH ĐÓ VÀ PUSH LÊN BRANCH ĐÓ LUÔN. LÀM THEO CÁC BƯỚC THAO TÁC VỚI GIT ĐÃ HƯỚNG DẪN TRƯỚC ĐÓ. 
## 3. BẮT BUỘC COMMIT TRƯỚC KHI PUSH LÊN BRANCH. NỘI DUNG COMMIT RÕ RÀNG, DỄ HIỂU VỀ CÁC VẤN ĐỀ ĐÃ THỰC HIỆN TRONG SOURCE.
## 4. NHỚ COMMENT CODE, NHẤT LÀ NHỮNG ĐOẠN CODE PHỨC TẠP (ĐÃ HƯỚNG DẪN TRƯỚC ĐÓ).

# FIGHTING
