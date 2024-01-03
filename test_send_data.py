import requests

api_key = "tPmAT5Ab3j7F9"
stm32_id = "12345"
date_in = "2023-12-14"
time_in = "09:00:00"

# Tạo payload gửi đến server
payload = {
    "api_key": api_key,
    "stm32_id": stm32_id,
    "date_in": date_in,
    "time_in": time_in
}

# Gửi yêu cầu POST đến server
response = requests.post("http://localhost/web/php/dashboard.php", data=payload)

# Kiểm tra kết quả
if response.status_code == 200:
    print("Tín hiệu đã được gửi thành công!")
else:
    print("Có lỗi xảy ra khi gửi tín hiệu.")