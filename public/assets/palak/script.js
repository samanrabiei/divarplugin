document.addEventListener("DOMContentLoaded", () => {
    const fields = [
        "palak_part_1",
        "palak_letter",
        "palak_part2",
        "palak_irancode"
    ];

    fields.forEach((id, index) => {
        const input = document.getElementById(id);
        const nextInput = document.getElementById(fields[index + 1]);

        input.addEventListener("input", () => {
            if (input.value.length >= input.maxLength && nextInput) {
                nextInput.focus();
            }
        });
    });
});