<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
    
        .contact-card {
            background: #fff;
            border-radius: 16px;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            animation: slideFade 1s ease forwards;
            opacity: 0; /* Initial state for animation */
            transform: translateY(50px);
        }

        @keyframes slideFade {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .contact-card h2 {
            text-align: center;
            font-weight: bold;
            color: #254D70;
            margin-bottom: 25px;
            animation: fadeInUp 0.8s ease forwards;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-control {
            border-radius: 10px;
            transition: all 0.4s ease;
        }

        .form-control:focus {
            border-color: #254D70;
            box-shadow: 0 0 12px rgba(37, 77, 112, 0.5);
            transform: scale(1.03);
        }

        .btn-send {
            background: #254D70;
            border: none;
            border-radius: 12px;
            font-weight: 500;
            padding: 12px;
            transition: all 0.3s ease;
        }

        .btn-send:hover {
            background: #193656;
            transform: translateY(-4px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.25);
        }

        .alert {
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    <?php $this->load->view('layout/header'); ?>

    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="contact-card">
            <h2><i class="bi bi-envelope-paper-heart"></i> Contact Us</h2>

            <!-- Validation Errors -->
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger">
                    <?php echo validation_errors(); ?>
                </div>
            <?php endif; ?>

            <!-- Success Message -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>

            <?php echo form_open('contact/submit'); ?>

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-person-circle"></i> Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name">
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-envelope"></i> Email</label>
                <input type="text" name="email" class="form-control" placeholder="Enter your email">
            </div>

            <div class="mb-3">
                <label class="form-label"><i class="bi bi-chat-left-text"></i> Message</label>
                <textarea name="message" class="form-control" rows="4" placeholder="Write your message..."></textarea>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-send text-white">
                    <i class="bi bi-send-fill"></i> Send Message
                </button>
            </div>

            </form>
        </div>
    </div>

    <?php $this->load->view('layout/footer'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
