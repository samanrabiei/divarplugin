document.addEventListener("DOMContentLoaded", function () {
    const part1 = document.getElementById("palak_part_1");
    const letter = document.getElementById("palak_letter");
    const part2 = document.getElementById("palak_part2");
    const irancode = document.getElementById("palak_irancode");

    // لیست فیلدها به ترتیب
    const fields = [part1, letter, part2, irancode];

    fields.forEach((field, index) => {
        // حرکت به جلو
        field.addEventListener("input", function () {
            if (this.value.length >= this.maxLength) {
                if (fields[index + 1]) {
                    fields[index + 1].focus();
                }
            }
        });

        // حرکت به عقب با بک‌اسپیس
        field.addEventListener("keydown", function (e) {
            if (e.key === "Backspace" && this.value.length === 0) {
                if (fields[index - 1]) {
                    fields[index - 1].focus();
                }
            }
        });
    });
});

['palak_part_1', 'palak_part2', 'palak_irancode'].forEach(function (id) {
    document.getElementById(id).addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, ''); // حذف هرچیزی غیرعدد
        if (this.value.length > this.maxLength) {
            this.value = this.value.slice(0, this.maxLength);
        }
    });
});

// فقط یک حرف — برای حرف وسط
document.getElementById('palak_letter').addEventListener('input', function () {
    this.value = this.value.replace(/[^آ-یA-Za-z]/g, ''); // فقط حرف
    if (this.value.length > 1) {
        this.value = this.value.slice(0, 1);
    }
});