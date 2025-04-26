$("#searchbar-pc").keyup(function () {
    let q = $("#searchbar-pc").val();

    $.ajax({
        type: "POST",
        url: "/app/utils/search.php",
        data: { type: 1, q:q },
        success: function (html) {
            $("#search-video-result-pc").html(html);
        }
    });
});

$("#searchbar-mobile").keyup(function () {
    let q = $("#searchbar-mobile").val();
    
    $.ajax({
        type: "POST",
        url: "/app/utils/search.php",
        data: { type: 2, q:q },
        success: function (html) {
            $("#search-video-result-mobile").html(html);
        }
    });
});
document.addEventListener('DOMContentLoaded', function () {

    const phoneInput = document.getElementById('number');
    const gradeInput = document.getElementById('grade');

    if (phoneInput) {
        phoneInput.addEventListener('input', formatPhoneNumber);
        phoneInput.form.addEventListener('submit', function() {
            phoneInput.value = phoneInput.value.replace(/\D/g, '');
        });
    }

    if (gradeInput) {
        gradeInput.addEventListener('input', formatGrade);
        gradeInput.addEventListener('blur', validateGrade);
    }

    function formatPhoneNumber(e) {
        let value = e.target.value.replace(/\D/g, '');

        if (!value.startsWith('0')) {
            value = '0' + value;
        }

        let formatted = value.substring(0, 1);
        if (value.length > 1) formatted += ' (' + value.substring(1, 4);
        if (value.length >= 4) formatted += ') ' + value.substring(4, 7);
        if (value.length >= 7) formatted += ' ' + value.substring(7, 9);
        if (value.length >= 9) formatted += ' ' + value.substring(9, 11);

        e.target.value = formatted;
    }

    function formatGrade(e) {
        let value = e.target.value.replace(/[^0-9]/g, '');
        if (!value) return;

        let intPart = value.substring(0, 1);
        let decimalPart = value.substring(1, 3);

        let formatted = intPart;
        if (decimalPart.length > 0) {
            formatted += '.' + decimalPart;
        }

        e.target.value = formatted;
    }

    function validateGrade() {
        let value = gradeInput.value.trim();
        if (value === '') return;

        let number = parseFloat(value);
        if (isNaN(number) || number < 0 || number > 4) {
            gradeInput.value = '';
            alert("Akademik Ortalama için lütfen 0.00 ile 4.00 arasında bir değer giriniz.");
            return;
        }

        gradeInput.value = number.toFixed(2);
    }

});

