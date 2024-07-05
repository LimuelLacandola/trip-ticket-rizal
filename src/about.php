<?php require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="images/title-logo.png">
    <link href="./output.css" rel="stylesheet">
    <link href="./styles.css" rel="stylesheet">
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">

    <title>About</title>
</head>

<body class="bg-gray-100">

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-gray-200 px-6 py-4">
                <h1 class="text-2xl font-bold text-gray-900">About Me</h1>
                <p class="text-gray-700">Learn more about the developer behind the scenes.</p>
            </div>

            <div class="p-6">
                <img src="images/developer.png" alt="Profile Picture" class="w-50 h-48 object-cover object-center ml-auto mr-auto rounded-md mb-6">
                <p class="text-gray-700 leading-relaxed">
                    Hello! I'm <b><?php echo DEVELOPER; ?></b>, a dedicated web developer and student from <b><?php echo LOCATION; ?></b>. I focus on creating easy-to-use web and android applications using the latest technologies.</p>
            </div>


            <div class="bg-gray-100 px-6 py-4">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Skills</h2>
                <div class="grid grid-cols-3 gap-4">
                    <div class="flex items-center">
                        <i class="bi bi-filetype-html text-3xl text-red-500 mr-2"></i> HTML
                    </div>
                    <div class="flex items-center">
                        <i class="bi bi-filetype-css text-3xl text-blue-500 mr-2"></i> Tailwind CSS
                    </div>
                    <div class="flex items-center">
                        <i class="bi bi-bootstrap text-3xl text-purple-500 mr-2"></i> Bootstrap
                    </div>
                    <div class="flex items-center">
                        <i class="bi bi-filetype-js text-3xl text-yellow-500 mr-2"></i> JavaScript
                    </div>
                    <div class="flex items-center">
                        <i class="bi bi-filetype-php text-3xl text-indigo-500 mr-2"></i> PHP
                    </div>
                    <div class="flex items-center">
                        <i class="bi bi-palette text-3xl text-green-500 mr-2"></i> UI/UX Design Principles
                    </div>
                </div>
            </div>



            <div class="p-6 bg-gray-200">
                <h2 class="text-xl font-bold text-gray-900 mb-4">Contact Me</h2>
                <p class="text-gray-700 leading-relaxed">Interested in working together or have any questions? Feel free to reach out!</p>
                <div class="mt-4">
                    <p class="text-gray-700"><span class="font-semibold"><i class="bi-envelope-at text-2xl text-red-500 mr-2"></i> lacandola.l.bsinfotech@gmail.com</span></p>
                    <p class="text-gray-700"><span class="font-semibold"><i class="bi bi-telephone text-2xl text-blue-500 mr-2"></i> +63 955 465 4133</span></p>
                    <p class="text-gray-700"><span class="font-semibold"><i class="bi bi-globe2 text-2xl text-green-500 mr-2"></i> <a href="https://limuellacandola.github.io/portfolio">limuellacandola.github.io</a></span></p>
                    <p class="text-gray-700"><span class="font-semibold"><i class="bi bi-geo-alt text-2xl text-yellow-500 mr-2"></i> Quezon City, Philippines</span></p>
                </div>
            </div>

        </div>
    </div>


    </div>

</body>

</html>