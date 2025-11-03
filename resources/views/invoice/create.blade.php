<!doctype html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <title>صورتحساب</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">
    <div class="container">
        <h3>ایجاد صورتحساب</h3>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="post" action="{{ route('invoice.pay') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">مبلغ (تومان)</label>
                <input type="number" name="amount" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">توضیحات (اختیاری)</label>
                <input type="text" name="description" class="form-control">
            </div>
            <button class="btn btn-primary">پرداخت</button>
        </form>
    </div>
</body>

</html>
