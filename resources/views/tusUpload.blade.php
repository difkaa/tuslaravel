<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://releases.transloadit.com/uppy/v2.12.2/uppy.min.css" rel="stylesheet">
    <title>Uppy Upload</title>
</head>

<body>
    <div id="tus_file"></div>
    <!-- <form method="post" enctype="multipart/form-data" action="http://localhost:8084/codeigniter/index.php/laporan/upload">
    <input type="file" name="tus_file" id="tus_file">
    <button type="submit">upload simpan</button>

    </form> -->
    <script src="https://releases.transloadit.com/uppy/v2.12.2/uppy.min.js"></script>
    <script>
        var uppy = new Uppy.Core()
            .use(Uppy.Dashboard, {
                inline: true,
                target: '#tus_file'
            })
            // .use(Uppy.Tus, { endpoint: 'http://localhost:8084/codeigniter/index.php/laporan/server' })
            .use(Uppy.Tus, { endpoint: 'https://9745-125-160-237-204.ngrok.io/tus' })

        uppy.on('complete', (result) => {
            console.log('Upload complete! We’ve uploaded these files:', result.successful)
        })
    </script>
      <!-- <script>
            const uppy = Uppy.Core({debug: true, autoProceed: false, meta: {
                         pageid: 1488
            }}).use(Uppy.Dashboard, {target: '#tus_file', inline: true})
                .use(Uppy.Tus, {endpoint: 'http://localhost:8084/codeigniter/index.php/laporan/server', limit:10});
    </script> -->
</body>

</html>