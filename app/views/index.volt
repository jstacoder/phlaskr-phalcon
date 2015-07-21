<!DOCTYPE html>
<html>
	<head>
		<title>Phalcon PHP Framework</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	</head>
	<body>
        <p><?php $this->flash->output(); ?></p>
        <div class=container>
            <div class=row>
                <div class="col-md-4 col-md-push-4">
                    <p>Main index.volt</p>
                </div>
            </div>
            <div class=row>
        		{{ content() }}
            </div>
        </div>
	</body>
</html>
