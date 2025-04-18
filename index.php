<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
</head>

<body>

    <div id="threeDSModal" style="display:none;">
        <iframe id="threeDSFrame" width="80%" height="500px"></iframe>
    </div>

</body>

</html>

<script>

    function open3DSInIframe(htmlContent) {
        const iframe = document.getElementById('threeDSFrame');
        const doc = iframe.contentWindow.document;
        doc.open();
        doc.write(htmlContent);
        doc.close();

        document.getElementById('threeDSModal').style.display = 'block';
    }

    fetch('http://127.0.0.1:8000/api/payment')
        .then(res => res.text())
        .then(data => {
            const data2 = JSON.parse(data)
            console.log(data2.data.result.resResponseContents)
            open3DSInIframe(data2.data.result.resResponseContents);
        });
</script>
