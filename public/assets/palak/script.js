document.addEventListener("DOMContentLoaded", function () {

    function autoMove(inputs) {
        inputs.forEach((input, index) => {

            input.addEventListener("input", function () {
                // جلوگیری از ورود بیش از حد مجاز
                if (this.value.length > this.maxLength) {
                    this.value = this.value.slice(0, this.maxLength);
                }

                // رفتن به فیلد بعدی
                if (this.value.length == this.maxLength && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            input.addEventListener("keydown", function (event) {
                // Backspace → رفتن به قبلی و خالی کردن
                if (event.key === "Backspace" && this.value === "" && index > 0) {
                    inputs[index - 1].focus();
                }
            });

        });
    }

    const plateInputs = [
        document.getElementById("palak_part_1"),   // 2 رقم
        document.getElementById("palak_letter"),   // 1 حرف
        document.getElementById("palak_part2"),    // 3 رقم
        document.getElementById("palak_irancode")  // 2 رقم
    ];

    autoMove(plateInputs);

});
