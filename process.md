Quy trình
===

Sprint
---

Sự kiện mà cả nhóm Scrum thực hiện việc tạo ra phần tăng trưởng. Dài 1 tuần.

Sprint Planning
---

Planning để lập kế hoạch cho sprint. Sprint Planning có hai sản phẩm, thứ nhất là mục tiêu sprint,
thứ hai là danh sách các công việc cần làm, do nhóm phát triển phân rã ra.

Sprint Planning diễn ra vào 15:00 ngày thứ 2 hàng tuần. Timebox cho mỗi sản phẩm của Sprint Planning 
là 1 tiếng.

Sprint Goal
---

Sprint Goal cần đặt ở nơi dễ thấy nhất của bảng Sprint Backlog

Daily Meeting
---

Diễn ra vào 08:45 hàng ngày. Daily Meeting dùng để đồng bộ hóa việc tiến tới Sprint Goal của nhóm 
phát triển. Vào phiên daily meeting, mỗi thành viên của nhóm phát triển có nhiệm vụ tự trả lời to rõ 
ba câu hỏi sau:

- Hôm qua (kể từ sau phiên daily trước) tôi đã làm gì để phục vụ mục tiêu chung ?
- Hôm nay (cho tới phiên daily tiếp theo) tôi sẽ làm gì để phục vụ mục tiêu chung ?
- Những khó khăn cản trở tôi thực hiện mục tiêu chung là ?

Nếu vì nguyên nhân từ phía một cá nhân nào đó, mà buổi daily meeting không thể đạt được hiệu quả "đồng
bộ hóa việc tiến tới mục tiêu" trên phạm vi cả nhóm, ví dụ đi muộn, quên họp, v.v. thì thành viên đó 
ra bảng Sprint Backlog và nói lời xin lỗi mục tiêu, đồng thời vẫn tự trả lời to rõ ba câu hỏi trên.

Quy trình tạo/review/merge nhánh
---

- Nhánh issue đuợc tách CHỈ từ nhánh `dev`.
- Sau khi dev cảm thấy nhánh đã ở trạng thái có thể merge được thì tạo merge request tới nhánh `dev` để 
review.
- Mã đuợc approve bởi ít nhất một người trong đội phát triển và sau đó được gán nhãn Approved.
- Nhánh được `merge --no-ff` vào `dev`.
- Issue được chuyển sang trạng thái "Testing"

Định nghĩa hoàn thành
---

Những mục sau cần được xác nhận trước khi bất cứ một công việc nào được gọi là Done:

- Giao diện tuân theo final prototype
- Sử dụng màu mặc định của Bootstrap
- Code đã đuợc review chéo
- Tất cả code đã tuân thủ đúng coding convention
- Đã refactor sau khi review chéo ít nhất 1 lần
- Dữ liệu seeding đẹp
- Chức năng đã đưọc test chéo
- Test trên nhiều trình duyệt (IE, Chrome , Firefox)
- Các trường nhập liệu đã được validate ở client
- Các trường nhập liệu đã validate ở backend
- Messages đã hỗ trợ I18n
- Đã merge vào nhánh dev

Coding Convention
---

- Đặt tên file: CamelCase
- Đặt tên class: CamelCase
- Đặt tên hàm: camelCase
- Đặt tên biến: camelCase
- Lùi đầu dòng: sử dụng 2 SPACE cho mã HTML và 4 SPACE cho mã JavaScript, PHP...
- Khoảng trắng: thay TAB bằng SPACE, phải có 1 SPACE sau `if`, `switch`, `for`, .... ; phải có 1 SPACE 
trước `{`
- Xuống dòng: cuối file phải có MỘT dòng trắng
- Tên phải rõ ý: tên class biểu thị nó có chức gì; tên hàm biểu thị nó làm gì, trả về gì; tên param trong 
hàm biểu thị nó đại diện cho cái gì; tên biến biểu thị nó lưu trữ dữ liệu gì.
