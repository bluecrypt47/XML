Người thực hiện: Lê Trần Văn Chương.

Thời gian: 11/05/2020.

Mục lục:
- [XML external entity (XXE) injection](#xml-external-entity-xxe-injection)
- [Lab](#lab)

## XML external entity (XXE) injection 
- XML external entity (XXE) injection là một lỗ hổng bảo mật web cho phép kẻ tấn công can thiệp vào quá trình xử lý dữ liệu XML của ứng dụng. Nó thường cho phép kẻ tấn công xem các tệp trên hệ thống tệp của máy chủ ứng dụng và tương tác với bất kỳ hệ thống bên ngoài hoặc bên trong nào mà chính ứng dụng có thể truy cập.
- Một số ứng dụng sử dụng định dạng XML để truyền dữ liệu giữa trình duyệt và máy chủ. Các ứng dụng thực hiện điều này hầu như luôn sử dụng thư viện chuẩn hoặc API nền tảng để xử lý dữ liệu XML trên máy chủ. Các lỗ hổng XXE phát sinh do đặc tả XML chứa nhiều tính năng nguy hiểm tiềm ẩn khác nhau và trình phân tích cú pháp tiêu chuẩn hỗ trợ các tính năng này ngay cả khi chúng không được ứng dụng sử dụng bình thường.

## Lab
- Giả sử, tôi muốn kiểm tra số lượng hiện của 1 mặt hàng đang có trong kho của tôi. và kết quả ở hình dưới.
![Hình 1.](~/../img/1.png)

- Tôi sẽ thử chèn thêm đoạn code sau `<!DOCTYPE test [ <!ENTITY xxe "hallo"> ]>` vào xml và giá trị `productId` tôi sẽ thay bằng `&xxe;` để hiện kết quả lên (hình dưới).
![Hình 3.](~/../img/3.png)

- Ở trên chỉ là 1 phép thử nhỏ. Tiếp theo, tôi sẽ chèn thêm đoạn code sau `<!DOCTYPE test [ <!ENTITY xxe SYSTEM "file:///etc/passwd"> ]>` thay `hallo` bằng `SYSTEM "file:///etc/passwd"` và mọi thứ giữ nguyên. Kết quả (hình dưới).
![Hình 2.](~/../img/2.png)



