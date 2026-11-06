<?php
$page_title = 'Request a Service | EnergyHub Services';
$page_description = 'Request electrical equipment diagnosis, installation, maintenance, component support, site assistance, or a custom technical service.';
$page_social_image = 'assets/images/photo12.png';
$body_class = 'page-request-service';

require_once __DIR__ . '/includes/service-data.php';
require_once __DIR__ . '/includes/form-handler.php';

$requested_service = isset($_GET['service']) && is_string($_GET['service']) ? $_GET['service'] : '';
$service_ids = array_column($services, 'id');
$preselected_service = in_array($requested_service, $service_ids, true) ? $requested_service : '';
$form_state = create_form_state();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $form_state = form_submission_result('service_request', $_POST, $service_ids);
    if (!empty($form_state['saved'])) {
        $_SESSION['form_success'] = !empty($form_state['notification_sent'])
            ? 'Your service request has been received. Thank you.'
            : 'Your service request was saved, but we could not send an email notification. Please contact gravityhubautomation@gmail.com directly.';
        $_SESSION['form_csrf_token'] = bin2hex(random_bytes(32));
        session_regenerate_id(true);
        header('Location: request-service.php#request-form', true, 303);
        exit;
    }
}
$selected_service = $form_state['values']['serviceType'] ?? $preselected_service;

include 'includes/head.php';
include 'includes/header.php';
?>

<main id="main-content">
<!-- Page Hero -->
<section class="page-hero">
    <div class="hero-background" aria-hidden="true">
        <img class="hero-slide is-active" src="assets/images/photo12.png" srcset="<?php echo webp_image_srcset('assets/images/photo12.png'); ?>" alt="" aria-hidden="false" fetchpriority="high" decoding="async">
    </div>
    <div class="hero-bg-overlay" aria-hidden="true"></div>
    <div class="container hero-container">
        <div class="page-hero-content reveal">
            <h1>Request a Service</h1>
            <p>Tell us what equipment is involved, what support you need, and where the work may be required. We will review the details before confirming possible next steps.</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="request-form-card reveal" id="request-form">
            <h2>Service Request Form</h2>
            <p style="color: var(--color-text-muted); margin-bottom: var(--space-6);">The more detail you can share about the equipment and your goal, the easier it is to understand what you need.</p>

            <?php if ($form_state['success'] !== ''): ?>
            <div class="alert alert-success" role="status"><?php echo htmlspecialchars($form_state['success'], ENT_QUOTES, 'UTF-8'); ?></div>
            <?php endif; ?>
            <?php if (!empty($form_state['errors']['general'])): ?>
            <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($form_state['errors']['general'], ENT_QUOTES, 'UTF-8'); ?></div>
            <?php endif; ?>

            <form data-validate id="requestForm" method="post" novalidate>
                <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($form_state['csrf_token'], ENT_QUOTES, 'UTF-8'); ?>">
                <div class="form-row">
                    <div class="form-group">
                        <label for="customerName">Company or Customer Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control<?php echo isset($form_state['errors']['customerName']) ? ' is-invalid' : ''; ?>" id="customerName" name="customerName" placeholder="Your company or full name" maxlength="150" value="<?php echo escape_form_value($form_state, 'customerName'); ?>" required>
                        <div class="invalid-feedback"><?php echo form_field_error($form_state, 'customerName', 'Please enter your company or name.'); ?></div>
                    </div>
                    <div class="form-group">
                        <label for="customerPhone">Phone <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control<?php echo isset($form_state['errors']['customerPhone']) ? ' is-invalid' : ''; ?>" id="customerPhone" name="customerPhone" placeholder="1234567890" maxlength="40" value="<?php echo escape_form_value($form_state, 'customerPhone'); ?>" required>
                        <div class="invalid-feedback"><?php echo form_field_error($form_state, 'customerPhone', 'Please enter a valid phone number.'); ?></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="customerEmail">Email Address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control<?php echo isset($form_state['errors']['customerEmail']) ? ' is-invalid' : ''; ?>" id="customerEmail" name="customerEmail" placeholder="you@example.com" maxlength="254" value="<?php echo escape_form_value($form_state, 'customerEmail'); ?>" required>
                        <div class="invalid-feedback"><?php echo form_field_error($form_state, 'customerEmail', 'Please enter a valid email address.'); ?></div>
                    </div>
                    <div class="form-group">
                        <label for="serviceType">Service Type <span class="text-danger">*</span></label>
                        <select class="form-control<?php echo isset($form_state['errors']['serviceType']) ? ' is-invalid' : ''; ?>" id="serviceType" name="serviceType" required>
                            <option value="">Select a service</option>
                            <?php foreach ($services as $service): ?>
                            <option value="<?php echo htmlspecialchars($service['id']); ?>"<?php echo $selected_service === $service['id'] ? ' selected' : ''; ?>><?php echo htmlspecialchars($service['title']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback"><?php echo form_field_error($form_state, 'serviceType', 'Please select a service.'); ?></div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="equipmentType">Equipment or Device Type</label>
                        <input type="text" class="form-control" id="equipmentType" name="equipmentType" placeholder="e.g. energy monitor, control panel" maxlength="200" value="<?php echo escape_form_value($form_state, 'equipmentType'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="deviceModel">Manufacturer and Model, if known</label>
                        <input type="text" class="form-control" id="deviceModel" name="deviceModel" placeholder="Manufacturer / model" maxlength="200" value="<?php echo escape_form_value($form_state, 'deviceModel'); ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="siteLocation">Site Location (for on-site requests)</label>
                        <input type="text" class="form-control" id="siteLocation" name="siteLocation" placeholder="City, area, or site address" maxlength="255" value="<?php echo escape_form_value($form_state, 'siteLocation'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="materialNeeds">May replacement components or materials be needed?</label>
                        <select class="form-control<?php echo isset($form_state['errors']['materialNeeds']) ? ' is-invalid' : ''; ?>" id="materialNeeds" name="materialNeeds">
                            <option value="">Select if known</option>
                            <option value="yes"<?php echo ($form_state['values']['materialNeeds'] ?? '') === 'yes' ? ' selected' : ''; ?>>Possibly yes</option>
                            <option value="no"<?php echo ($form_state['values']['materialNeeds'] ?? '') === 'no' ? ' selected' : ''; ?>>No</option>
                            <option value="unsure"<?php echo ($form_state['values']['materialNeeds'] ?? '') === 'unsure' ? ' selected' : ''; ?>>Not sure</option>
                        </select>
                        <div class="invalid-feedback"><?php echo form_field_error($form_state, 'materialNeeds', 'Please select a valid option.'); ?></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="issueDescription">What is happening, or what would you like done? <span class="text-danger">*</span></label>
                    <textarea class="form-control<?php echo isset($form_state['errors']['issueDescription']) ? ' is-invalid' : ''; ?>" id="issueDescription" name="issueDescription" rows="5" maxlength="5000" placeholder="Describe the issue or goal, when it started (if relevant), any checks already completed, and useful site or access details." required><?php echo escape_form_value($form_state, 'issueDescription'); ?></textarea>
                    <div class="invalid-feedback"><?php echo form_field_error($form_state, 'issueDescription', 'Please describe the fault or required task.'); ?></div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="contactMethod">Preferred Contact Method <span class="text-danger">*</span></label>
                        <select class="form-control<?php echo isset($form_state['errors']['contactMethod']) ? ' is-invalid' : ''; ?>" id="contactMethod" name="contactMethod" required>
                            <option value="">Select contact method</option>
                            <option value="phone"<?php echo ($form_state['values']['contactMethod'] ?? '') === 'phone' ? ' selected' : ''; ?>>Phone</option>
                            <option value="email"<?php echo ($form_state['values']['contactMethod'] ?? '') === 'email' ? ' selected' : ''; ?>>Email</option>
                        </select>
                        <div class="invalid-feedback"><?php echo form_field_error($form_state, 'contactMethod', 'Please select a contact method.'); ?></div>
                    </div>
                    <div class="form-group">
                        <label for="preferredTime">Preferred Contact Time (optional)</label>
                        <input type="text" class="form-control" id="preferredTime" name="preferredTime" placeholder="A suitable day or time" maxlength="150" value="<?php echo escape_form_value($form_state, 'preferredTime'); ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lg">Submit Service Request</button>
            </form>
        </div>
    </div>
</section>
</main>

<?php include 'includes/footer.php'; ?>

<script src="assets/js/main.js?v=<?php echo filemtime(__DIR__ . '/assets/js/main.js'); ?>" defer></script>
</body>
</html>