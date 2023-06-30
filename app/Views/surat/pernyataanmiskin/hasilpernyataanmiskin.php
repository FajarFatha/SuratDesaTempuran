<?= $this->extend('layout/main'); ?>
<?= $this->Section('konten'); ?>
<div class="container">
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="row mb-3">
        <div class="col-sm-10">
            <form action="/pernyataanmiskin" method="post">
                <input type="hidden" name="slug" value="pernyataanmiskin">
                <button class="btn btn-danger" type="submit">kembali</button>
            </form>
            <!-- <a href="/back" class="btn btn-danger">Kembali</a> -->
        </div>
        <div class="col-sm-2">
            <a href="/pernyataanmiskindocx" class="btn btn-primary">download docx file</a>
        </div>
    </div>
    <div class="row">
        <div class="col">

            <?php
            $apiKey = "fajarfatharr@gmail.com_94e8dfb81d1c44fc06ce45f0beaee52dcc23df2c890462709622c658cb7eb0d899228924";


            $url = "https://api.pdf.co/v1/file/upload/get-presigned-url" .
                "?name=" . urlencode("hasil_pernyataanmiskin.docx") .
                "&contenttype=application/octet-stream";

            // Create request
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_HTTPHEADER, array("x-api-key: " . $apiKey));
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            // Execute request
            $result = curl_exec($curl);

            if (curl_errno($curl) == 0) {
                $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

                if ($status_code == 200) {
                    $json = json_decode($result, true);

                    if (!isset($json["error"]) || $json["error"] == false) {
                        // Get URL to use for the file upload
                        $uploadFileUrl = $json["presignedUrl"];
                        // Get URL of uploaded file to use with later API calls
                        $uploadedFileUrl = $json["url"];

                        // 2. UPLOAD THE FILE TO CLOUD.

                        $localFile = "../public/hasil/hasil_pernyataanmiskin.docx";
                        $fileHandle = fopen($localFile, "r");

                        curl_setopt($curl, CURLOPT_URL, $uploadFileUrl);
                        curl_setopt($curl, CURLOPT_HTTPHEADER, array("content-type: application/octet-stream"));
                        curl_setopt($curl, CURLOPT_PUT, true);
                        curl_setopt($curl, CURLOPT_INFILE, $fileHandle);
                        curl_setopt($curl, CURLOPT_INFILESIZE, filesize($localFile));

                        // Execute request
                        curl_exec($curl);

                        fclose($fileHandle);

                        if (curl_errno($curl) == 0) {
                            $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

                            if ($status_code == 200) {
                                // 3. CONVERT UPLOADED DOC FILE TO PDF

                                DocToPdf($apiKey, $uploadedFileUrl, '');
                            } else {
                                // Display request error
                                echo "<p>Status code: " . $status_code . "</p>";
                                echo "<p>" . $result . "</p>";
                            }
                        } else {
                            // Display CURL error
                            echo "Error: " . curl_error($curl);
                        }
                    } else {
                        // Display service reported error
                        echo "<p>Error: " . $json["message"] . "</p>";
                    }
                } else {
                    // Display request error
                    echo "<p>Status code: " . $status_code . "</p>";
                    echo "<p>" . $result . "</p>";
                }

                curl_close($curl);
            } else {
                // Display CURL error
                echo "Error: " . curl_error($curl);
            }

            function DocToPdf($apiKey, $uploadedFileUrl, $pages)
            {
                // Create URL
                $url = "https://api.pdf.co/v1/pdf/convert/from/doc";

                // Prepare requests params
                $parameters = array();
                $parameters["url"] = $uploadedFileUrl;
                $parameters["pages"] = $pages;

                // Create Json payload
                $data = json_encode($parameters);

                // Create request
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_HTTPHEADER, array("x-api-key: " . $apiKey, "Content-type: application/json"));
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

                // Execute request
                $result = curl_exec($curl);

                if (curl_errno($curl) == 0) {
                    $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

                    if ($status_code == 200) {
                        $json = json_decode($result, true);

                        if (!isset($json["error"]) || $json["error"] == false) {
                            $resultFileUrl = $json["url"];

                            // Display link to the file with conversion results
                            echo "<iframe src=" . $resultFileUrl . " width='100%' height='500px' frameborder='0'></iframe>";
                            // echo "<div><h2>Conversion Result:</h2><a href='" . $resultFileUrl . "' target='_blank'>" . $resultFileUrl . "</a></div>";
                        } else {
                            // Display service reported error
                            echo "<p>Error: " . $json["message"] . "</p>";
                        }
                    } else {
                        // Display request error
                        echo "<p>Status code: " . $status_code . "</p>";
                        echo "<p>" . $result . "</p>";
                    }
                } else {
                    // Display CURL error
                    echo "Error: " . curl_error($curl);
                }

                // Cleanup
                curl_close($curl);
            }
            ?>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
<!-- <script>
    window.location.href = "/pages";
</script> -->
<?= $this->endSection('konten'); ?>