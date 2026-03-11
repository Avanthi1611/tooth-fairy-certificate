<?php
if (isset($_POST['generate'])) {
    $name = strtoupper(strip_tags($_POST['name']));
    $date = strip_tags($_POST['date']);
    $gender = $_POST['gender'];
    if ($gender == 'boy') {
        $pronoun = 'his';
    } elseif ($gender == 'girl') {
        $pronoun = 'her';
    } else {
        $pronoun = 'their'; 
    }
    
    $template_path = 'Certificate_tooth.jpg';
    $font_name = __DIR__ . '/CaveatBrush-Regular.ttf'; 
    $font_text = __DIR__ . '/DancingScript-VariableFont_wght.ttf'; 
    
    if (!file_exists($template_path)) die("Missing: " . $template_path);
    if (!file_exists($font_name)) die("Missing: CaveatBrush font");
    if (!file_exists($font_text)) die("Missing: DancingScript font");

    // Load and Scale
    $src = imagecreatefromjpeg($template_path);
    $img = imagecreatetruecolor(1123, 794);
    imagecopyresampled($img, $src, 0, 0, 0, 0, 1123, 794, imagesx($src), imagesy($src));

    $color_gold = imagecolorallocate($img, 255, 189, 89);
    $color_brown = imagecolorallocate($img, 94, 75, 60);

    //NAME
    $box1 = imagettfbbox(60, 0, $font_name, $name);
    $x1 = (1123 - abs($box1[4] - $box1[0])) / 2;
    imagettftext($img, 60, 0, $x1, 410, $color_gold, $font_name, $name);

    //DESCRIPTION (Who lost his/her/tjeir first tooth on)
    $line2 = "Who lost $pronoun first tooth on";
    $box2 = imagettfbbox(18, 0, $font_text, $line2);
    $x2 = (1123 - abs($box2[4] - $box2[0])) / 2;
    imagettftext($img, 18, 0, $x2, 490, $color_brown, $font_text, $line2);

    //DATE
    $box3 = imagettfbbox(20, 0, $font_text, $date);
    $x3 = (1123 - abs($box3[4] - $box3[0])) / 2;
    imagettftext($img, 20, 0, $x3, 530, $color_brown, $font_text, $date);

    //Export
    header('Content-Type: image/jpeg');
    header('Content-Disposition: attachment; filename="ToothFairy_'.$name.'.jpg"');
    imagejpeg($img, null, 100);
    imagedestroy($img);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tooth Fairy Portal | Certificate Generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { 
            background: #f0f4f8; 
            min-height: 100vh; 
            display: flex; 
            flex-direction: column;
        }
        .main-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
        }
        .card { 
            border-radius: 20px; 
            border: none; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.05); 
        }
        .btn-custom { 
            background: #FFBD59; 
            color: #5E4B3C; 
            font-weight: bold; 
            border: none; 
            padding: 12px;
        }
        .btn-custom:hover { 
            background: #f0ad43; 
            color: #5E4B3C;
        }
        footer {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border-top: 1px solid rgba(0,0,0,0.05);
            padding: 20px 0;
            text-align: center;
            color: #5E4B3C;
        }
        .footer-info p {
            margin: 2px 0;
            font-size: 0.9rem;
        }
        .footer-links a {
            color: #5E4B3C;
            text-decoration: none;
            margin: 0 10px;
            font-weight: 600;
        }
        .footer-links a:hover {
            color: #FFBD59;
        }
    </style>
</head>
<body>

    <div class="main-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card p-5">
                        <h3 class="text-center mb-4" style="color: #5E4B3C;"> Tooth Fairy Certificate Registry</h3>
                        <form method="POST">
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="e.g. John Doe" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pronoun Preference</label>
                                <select name="gender" class="form-select">
                                    <option value="neutral"> Their (Neutral)</option>
                                    <option value="girl"> Her</option>
                                    <option value="boy"> His</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date</label>
                                <input type="text" name="date" class="form-control" 
                                value="<?php echo date('F jS, Y'); ?>" required>
                            </div>
                            <button type="submit" name="generate" class="btn btn-custom w-100">Download Certificate</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="footer-info">
                <p><strong>Developed by Avanthika DG</strong></p>
                <p>Student at VIT Chennai | Reg: 24MIS1137</p>
            </div>
            <div class="footer-links mt-2">
                <a href="mailto:avanthika.career@gmail.com"><i class="fa-solid fa-envelope"></i> Email</a>
                <a href="https://github.com/Avanthi1611" target="_blank"><i class="fa-brands fa-github"></i> GitHub</a>
            </div>
        </div>
    </footer>

</body>
</html>