<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Dòng ngôn ngữ kiểm tra dữ liệu (Validation Language Lines)
    |--------------------------------------------------------------------------
    |
    | Các dòng ngôn ngữ sau chứa các thông báo lỗi mặc định được sử dụng bởi
    | lớp validator của Laravel. Bạn có thể tự do tùy chỉnh từng thông báo tại đây.
    |
    */

    'accepted' => 'Trường :attribute phải được chấp nhận.',
    'accepted_if' => 'Trường :attribute phải được chấp nhận khi :other là :value.',
    'active_url' => 'Trường :attribute không phải là một URL hợp lệ.',
    'after' => 'Trường :attribute phải là một ngày sau :date.',
    'after_or_equal' => 'Trường :attribute phải là một ngày sau hoặc bằng :date.',
    'alpha' => 'Trường :attribute chỉ có thể chứa chữ cái.',
    'alpha_dash' => 'Trường :attribute chỉ có thể chứa chữ cái, số, dấu gạch ngang và dấu gạch dưới.',
    'alpha_num' => 'Trường :attribute chỉ có thể chứa chữ cái và số.',
    'any_of' => 'Trường :attribute không hợp lệ.',
    'array' => 'Trường :attribute phải là một mảng.',
    'array_keys' => 'Trường :attribute phải chứa các khóa: :values.',
    'ascii' => 'Trường :attribute chỉ có thể chứa các ký tự chữ số và ký hiệu byte đơn.',
    'base64' => 'Trường :attribute phải là chuỗi Base64 hợp lệ.',
    'before' => 'Trường :attribute phải là một ngày trước :date.',
    'before_or_equal' => 'Trường :attribute phải là một ngày trước hoặc bằng :date.',
    'between' => [
        'array' => 'Trường :attribute phải có từ :min đến :max phần tử.',
        'file' => 'Dung lượng :attribute phải từ :min đến :max kilobytes.',
        'numeric' => 'Trường :attribute phải nằm trong khoảng :min đến :max.',
        'string' => 'Trường :attribute phải từ :min đến :max ký tự.',
    ],
    'boolean' => 'Trường :attribute phải là đúng hoặc sai.',
    'can' => 'Trường :attribute chứa giá trị không được phép.',
    'confirmed' => 'Xác nhận :attribute không khớp.',
    'contains' => 'Trường :attribute thiếu giá trị bắt buộc.',
    'current_password' => 'Mật khẩu hiện tại không chính xác.',
    'date' => 'Trường :attribute phải là một ngày hợp lệ.',
    'date_equals' => 'Trường :attribute phải là một ngày bằng :date.',
    'date_format' => 'Trường :attribute không khớp với định dạng :format.',
    'decimal' => 'Trường :attribute phải có :decimal chữ số thập phân.',
    'declined' => 'Trường :attribute phải bị từ chối.',
    'declined_if' => 'Trường :attribute phải bị từ chối khi :other là :value.',
    'different' => 'Trường :attribute và :other phải khác nhau.',
    'digits' => 'Trường :attribute phải gồm :digits chữ số.',
    'digits_between' => 'Trường :attribute phải có từ :min đến :max chữ số.',
    'dimensions' => 'Kích thước hình ảnh của :attribute không hợp lệ.',
    'distinct' => 'Trường :attribute có giá trị trùng lặp.',
    'doesnt_contain' => 'Trường :attribute không được chứa: :values.',
    'doesnt_end_with' => 'Trường :attribute không được kết thúc bằng một trong các giá trị sau: :values.',
    'doesnt_start_with' => 'Trường :attribute không được bắt đầu bằng một trong các giá trị sau: :values.',
    'email' => 'Trường :attribute phải là một địa chỉ email hợp lệ.',
    'encoding' => 'Trường :attribute phải được mã hóa theo :encoding.',
    'ends_with' => 'Trường :attribute phải kết thúc bằng một trong các giá trị sau: :values.',
    'enum' => 'Giá trị đã chọn trong :attribute không hợp lệ.',
    'exists' => 'Giá trị đã chọn trong :attribute không tồn tại.',
    'extensions' => 'Trường :attribute phải có một trong các đuôi mở rộng: :values.',
    'file' => 'Trường :attribute phải là một tập tin.',
    'filled' => 'Trường :attribute không được bỏ trống.',
    'gt' => [
        'array' => 'Trường :attribute phải có nhiều hơn :value phần tử.',
        'file' => 'Dung lượng :attribute phải lớn hơn :value kilobytes.',
        'numeric' => 'Trường :attribute phải lớn hơn :value.',
        'string' => 'Trường :attribute phải nhiều hơn :value ký tự.',
    ],
    'gte' => [
        'array' => 'Trường :attribute phải có ít nhất :value phần tử.',
        'file' => 'Dung lượng :attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'numeric' => 'Trường :attribute phải lớn hơn hoặc bằng :value.',
        'string' => 'Trường :attribute phải có từ :value ký tự trở lên.',
    ],
    'hex_color' => 'Trường :attribute phải là mã màu hexadecimal hợp lệ.',
    'image' => 'Trường :attribute phải là một hình ảnh.',
    'in' => 'Giá trị đã chọn trong :attribute không hợp lệ.',
    'in_array' => 'Trường :attribute phải tồn tại trong :other.',
    'in_array_keys' => 'Trường :attribute phải chứa ít nhất một trong các khóa: :values.',
    'integer' => 'Trường :attribute phải là số nguyên.',
    'ip' => 'Trường :attribute phải là một địa chỉ IP hợp lệ.',
    'ipv4' => 'Trường :attribute phải là địa chỉ IPv4 hợp lệ.',
    'ipv6' => 'Trường :attribute phải là địa chỉ IPv6 hợp lệ.',
    'json' => 'Trường :attribute phải là chuỗi JSON hợp lệ.',
    'list' => 'Trường :attribute phải là một danh sách.',
    'lowercase' => 'Trường :attribute phải viết thường.',
    'lt' => [
        'array' => 'Trường :attribute phải có ít hơn :value phần tử.',
        'file' => 'Dung lượng :attribute phải nhỏ hơn :value kilobytes.',
        'numeric' => 'Trường :attribute phải nhỏ hơn :value.',
        'string' => 'Trường :attribute phải ít hơn :value ký tự.',
    ],
    'lte' => [
        'array' => 'Trường :attribute không được có nhiều hơn :value phần tử.',
        'file' => 'Dung lượng :attribute phải nhỏ hơn hoặc bằng :value kilobytes.',
        'numeric' => 'Trường :attribute phải nhỏ hơn hoặc bằng :value.',
        'string' => 'Trường :attribute phải có tối đa :value ký tự.',
    ],
    'mac_address' => 'Trường :attribute phải là địa chỉ MAC hợp lệ.',
    'max' => [
        'array' => 'Trường :attribute không được có nhiều hơn :max phần tử.',
        'file' => 'Dung lượng :attribute không được vượt quá :max kilobytes.',
        'numeric' => 'Trường :attribute không được lớn hơn :max.',
        'string' => ':attribute không được vượt quá :max ký tự.',
    ],
    'max_digits' => 'Trường :attribute không được có nhiều hơn :max chữ số.',
    'mimes' => 'Trường :attribute phải là tập tin có định dạng: :values.',
    'mimetypes' => 'Trường :attribute phải là tập tin có loại MIME: :values.',
    'min' => [
        'array' => 'Trường :attribute phải có ít nhất :min phần tử.',
        'file' => 'Dung lượng :attribute phải tối thiểu :min kilobytes.',
        'numeric' => 'Trường :attribute không được nhỏ hơn :min.',
        'string' => ':attribute phải có ít nhất :min ký tự.',
    ],
    'min_digits' => 'Trường :attribute phải có ít nhất :min chữ số.',
    'missing' => 'Trường :attribute không được tồn tại.',
    'missing_if' => 'Trường :attribute không được tồn tại khi :other là :value.',
    'missing_unless' => 'Trường :attribute không được tồn tại trừ khi :other là :value.',
    'missing_with' => 'Trường :attribute không được tồn tại khi có :values.',
    'missing_with_all' => 'Trường :attribute không được tồn tại khi có tất cả :values.',
    'multiple_of' => 'Trường :attribute phải là bội số của :value.',
    'not_in' => 'Giá trị đã chọn trong :attribute không hợp lệ.',
    'not_regex' => 'Định dạng của :attribute không hợp lệ.',
    'numeric' => 'Trường :attribute phải là một số.',
    'password' => [
        'letters' => 'Trường :attribute phải chứa ít nhất một chữ cái.',
        'mixed' => 'Trường :attribute phải chứa cả chữ hoa và chữ thường.',
        'numbers' => 'Trường :attribute phải chứa ít nhất một chữ số.',
        'symbols' => 'Trường :attribute phải chứa ít nhất một ký tự đặc biệt.',
        'uncompromised' => 'Trường :attribute đã xuất hiện trong một vụ rò rỉ dữ liệu. Vui lòng chọn :attribute khác.',
    ],
    'present' => 'Trường :attribute phải có mặt.',
    'present_if' => 'Trường :attribute phải có mặt khi :other là :value.',
    'present_unless' => 'Trường :attribute phải có mặt trừ khi :other là :value.',
    'present_with' => 'Trường :attribute phải có mặt khi có :values.',
    'present_with_all' => 'Trường :attribute phải có mặt khi có tất cả :values.',
    'prohibited' => 'Trường :attribute bị cấm.',
    'prohibited_if' => 'Trường :attribute bị cấm khi :other là :value.',
    'prohibited_if_accepted' => 'Trường :attribute bị cấm khi :other được chấp nhận.',
    'prohibited_if_declined' => 'Trường :attribute bị cấm khi :other bị từ chối.',
    'prohibited_unless' => 'Trường :attribute bị cấm trừ khi :other nằm trong :values.',
    'prohibits' => 'Trường :attribute ngăn cấm sự xuất hiện của :other.',
    'regex' => 'Định dạng :attribute không hợp lệ.',
    'required' => ':attribute không được để trống.',
    'required_array_keys' => 'Trường :attribute phải chứa các mục cho: :values.',
    'required_if' => 'Trường :attribute bắt buộc nhập khi :other là :value.',
    'required_if_accepted' => 'Trường :attribute bắt buộc nhập khi :other được chấp nhận.',
    'required_if_declined' => 'Trường :attribute bắt buộc nhập khi :other bị từ chối.',
    'required_unless' => 'Trường :attribute bắt buộc nhập trừ khi :other nằm trong :values.',
    'required_with' => 'Trường :attribute bắt buộc nhập khi có mặt :values.',
    'required_with_all' => 'Trường :attribute bắt buộc nhập khi có mặt tất cả :values.',
    'required_without' => 'Trường :attribute bắt buộc nhập khi không có mặt :values.',
    'required_without_all' => 'Trường :attribute bắt buộc nhập khi không có mặt tất cả :values.',
    'same' => 'Trường :attribute và :other phải giống nhau.',
    'size' => [
        'array' => 'Trường :attribute phải chứa :size phần tử.',
        'file' => 'Dung lượng :attribute phải bằng :size kilobytes.',
        'numeric' => 'Trường :attribute phải bằng :size.',
        'string' => 'Trường :attribute phải có đúng :size ký tự.',
    ],
    'starts_with' => 'Trường :attribute phải bắt đầu bằng một trong các giá trị sau: :values.',
    'string' => 'Trường :attribute phải là một chuỗi ký tự.',
    'timezone' => 'Trường :attribute phải là một múi giờ hợp lệ.',
    'unique' => ':attribute đã tồn tại.',
    'uploaded' => 'Tải lên :attribute thất bại.',
    'uppercase' => 'Trường :attribute phải viết hoa.',
    'url' => 'Trường :attribute phải là một URL hợp lệ.',
    'ulid' => 'Trường :attribute phải là một ULID hợp lệ.',
    'uuid' => 'Trường :attribute phải là một UUID hợp lệ.',

    /*
    |--------------------------------------------------------------------------
    | Tùy chỉnh thông báo riêng cho từng thuộc tính
    |--------------------------------------------------------------------------
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Đổi tên hiển thị cho các thuộc tính (Attributes)
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'tenloai' => 'Tên loại',
        'tenhang' => 'Tên hãng',
        'tensanpham' => 'Tên sản phẩm',
        'loaisanpham_id' => 'Loại sản phẩm',
        'hangsanxuat_id' => 'Hãng sản xuất',
        'dongia' => 'Đơn giá',
        'soluong' => 'Số lượng',
        'hinhanh' => 'Hình ảnh',
        'motasanpham' => 'Mô tả sản phẩm',
        'dienthoaigiaohang' => 'Điện thoại giao hàng',
        'diachigiaohang' => 'Địa chỉ giao hàng',
        'tinhtrang_id' => 'Tình trạng đơn hàng',
        'name' => 'Họ và tên',
        'username' => 'Tên đăng nhập',
        'email' => 'Địa chỉ email',
        'password' => 'Mật khẩu',
        'password_confirmation' => 'Xác nhận mật khẩu',
        'role' => 'Quyền hạn',
    ],

];