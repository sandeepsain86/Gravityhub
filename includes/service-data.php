<?php
/**
 * Service Data
 *
 * Central content source for services, process steps, FAQs, and About page.
 */

if (!defined('ABSPATH')) {
    define('ABSPATH', __DIR__ . '/');
}

function webp_image_path(string $imagePath): string
{
    $webpPath = preg_replace('/\.(?:png|jpe?g)$/i', '.webp', $imagePath);
    return is_string($webpPath) ? $webpPath : $imagePath;
}

function webp_image_srcset(string $imagePath): string
{
    return htmlspecialchars(webp_image_path($imagePath), ENT_QUOTES, 'UTF-8') . ' 1x';
}

$services = [
    [
        'id'      => 'diagnosis',
        'title'   => 'Electrical Troubleshooting & Fault Diagnosis',
        'short'   => 'Understand what is wrong with your equipment, connection, or monitoring device.',
        'long'    => 'Get a structured review of a reported issue with supported electrical equipment, energy monitors, connections, or related systems. Sharing clear symptoms and equipment details helps the team understand what to assess.',
        'coverage' => 'Review the reported fault, affected equipment, visible indicators, and relevant connections or monitoring behaviour.',
        'provide' => 'Share the equipment type and make/model if known, what changed, when the issue started, any error indicators, and checks already completed. Photos can help explain what you are seeing.',
        'next'    => 'The team reviews the information and discusses whether further checks, a site visit, or another service may be suitable.',
        'note'    => 'Diagnosis and any further work depend on the information available and the assessment required.',
        'icon'    => 'search',
        'image'   => 'photo2.png',
        'cta'     => 'Request a Diagnosis',
    ],
    [
        'id'      => 'installation',
        'title'   => 'Equipment Installation & Commissioning',
        'short'   => 'Plan supported equipment installation, setup, and configuration.',
        'long'    => 'Discuss installation and configuration for supported devices and related connections. The team first reviews the equipment, site conditions, and requested outcome, then confirms what work may be possible.',
        'coverage' => 'Review equipment setup, configuration, connection requirements, and operational checks where applicable.',
        'provide' => 'Tell us the equipment make/model, what is already in place, the site location, the intended setup, and any relevant plans or photos.',
        'next'    => 'The team reviews the requirements and confirms the proposed scope, site arrangements, and availability before work is scheduled.',
        'note'    => 'Site work, commissioning checks, scheduling, and availability are confirmed case by case.',
        'icon'    => 'tools',
        'image'   => 'photo4.png',
        'cta'     => 'Request Installation',
    ],
    [
        'id'      => 'maintenance',
        'title'   => 'Preventive Maintenance & Servicing',
        'short'   => 'Discuss inspections and routine servicing for supported equipment.',
        'long'    => 'Plan a review of supported equipment, its visible condition, operation, and relevant connections. The maintenance scope is tailored to the equipment and the checks requested.',
        'coverage' => 'Discuss inspection needs, routine servicing, device operation, and supported connection checks.',
        'provide' => 'Share the equipment list and models if known, site location, maintenance goals, service history, and any concerns you have noticed.',
        'next'    => 'The team reviews the requested checks and confirms a suitable scope and availability. Any findings or further work can then be discussed.',
        'note'    => 'Maintenance can help identify issues; it does not guarantee uninterrupted operation or prevent every fault.',
        'icon'    => 'activity',
        'image'   => 'photo5.png',
        'cta'     => 'Request Maintenance',
    ],
    [
        'id'      => 'components',
        'title'   => 'Repair, Replacement & Component Support',
        'short'   => 'Review a faulty component and discuss possible repair or replacement routes.',
        'long'    => 'Describe the equipment or component issue so the team can assess whether repair, replacement, or reinstallation may be practical. Compatibility and sourcing are checked before any option is confirmed.',
        'coverage' => 'Review the reported issue and discuss component repair, replacement, or reinstallation where suitable.',
        'provide' => 'Share the equipment make/model, component markings if readable, symptoms, and clear photos of the device and affected part where safe to take.',
        'next'    => 'The team reviews feasibility and discusses possible options, compatibility, sourcing, and applicable costs before you decide how to proceed.',
        'note'    => 'Repair feasibility, component compatibility, sourcing, cost, and availability must be confirmed before work proceeds. EnergyHub does not promise ready stock or instant delivery.',
        'icon'    => 'cpu',
        'image'   => 'photo10.png',
        'cta'     => 'Ask About Components',
    ],
    [
        'id'      => 'onsite',
        'title'   => 'On-Site Technical Assistance',
        'short'   => 'Ask about an on-site review or agreed technical work at your location.',
        'long'    => 'Request an on-site assessment, troubleshooting, or agreed technical task. A visit can only be arranged after location, scope, scheduling, and service availability have been reviewed.',
        'coverage' => 'Discuss a site inspection, equipment troubleshooting, or a specific technical task at your location.',
        'provide' => 'Include the city and site address, equipment or site type, symptoms or required task, preferred timing, and any access or safety requirements.',
        'next'    => 'The team reviews the location and request, then confirms whether a visit is possible and what the proposed scope may involve.',
        'note'    => 'Site visits depend on location, scheduling, work scope, and service availability; they are not guaranteed until confirmed.',
        'icon'    => 'geo-alt',
        'image'   => 'photo9.png',
        'cta'     => 'Ask About a Site Visit',
    ],
    [
        'id'      => 'custom-tasks',
        'title'   => 'Custom Technical Tasks & Project Support',
        'short'   => 'Have a specific technical task? Tell us the outcome you need.',
        'long'    => 'For a setup, configuration, or project requirement that does not fit another category, describe the outcome you are aiming for. The team can review the scope and discuss whether it can be supported.',
        'coverage' => 'Review a specific equipment setup, configuration need, or related technical project task.',
        'provide' => 'Explain the goal, equipment involved, site location if relevant, preferred timing, and any known materials or access requirements.',
        'next'    => 'The team reviews feasibility and discusses a possible scope, required materials, arrangements, and applicable costs for your approval.',
        'note'    => 'Custom work and material sourcing are subject to assessment, feasibility, availability, and customer approval of applicable costs.',
        'icon'    => 'sliders',
        'image'   => 'photo8.png',
        'cta'     => 'Describe Your Task',
    ],
];

$trust_highlights = [
    [
        'title' => 'On-Call Guidance',
        'text'  => 'A call may resolve an estimated 20–30% of issues, depending on the fault and equipment. If it needs hands-on work, we can review an on-site visit.',
        'icon'  => 'headset',
    ],
    [
        'title' => 'Technician Visits',
        'text'  => 'We do not send an in-house crew. We coordinate with an available technician who can accept the job and visit your site after location and timing are confirmed.',
        'icon'  => 'person-gear',
    ],
    [
        'title' => 'Long-Term Projects',
        'text'  => 'Need several days or ongoing support? We can review multi-day technical work and planned project visits—not just one-off calls.',
        'icon'  => 'calendar2-week',
    ],
    [
        'title' => 'Work Reviewed First',
        'text'  => 'We confirm the scope, technician availability, materials, schedule, and applicable costs with you before any work begins.',
        'icon'  => 'clipboard-check',
    ],
];

$process_steps = [
    [
        'step'  => '01',
        'title' => 'Tell Us What You Need',
        'text'  => 'Choose the closest service category, or describe a custom technical task.',
    ],
    [
        'step'  => '02',
        'title' => 'Share the Details',
        'text'  => 'Include equipment details, symptoms or goals, and the site location if a visit may be needed.',
    ],
    [
        'step'  => '03',
        'title' => 'Review the Options',
        'text'  => 'We first check whether on-call guidance can help. If hands-on or multi-day work is needed, we review the scope and coordinate an available technician.',
    ],
    [
        'step'  => '04',
        'title' => 'Agree Before Work Starts',
        'text'  => 'Work proceeds only after the scope, applicable costs, and arrangements are confirmed.',
    ],
];

$faqs = [
    [
        'q' => 'Which electrical and energy-monitoring devices do you support?',
        'a' => 'Support depends on the equipment and the issue. Share the device or equipment type, make, and model so the team can review compatibility.',
    ],
    [
        'q' => 'How do I request troubleshooting or repair?',
        'a' => 'Choose Electrical Troubleshooting & Fault Diagnosis or Repair, Replacement & Component Support. Include the equipment model, symptoms, and any checks already completed.',
    ],
    [
        'q' => 'Can I request equipment installation?',
        'a' => 'Yes. Select Equipment Installation & Commissioning and describe the equipment, setup, and site location. Scope and availability are confirmed before work is arranged.',
    ],
    [
        'q' => 'Do you provide preventive maintenance?',
        'a' => 'You can request inspections or routine servicing for supported equipment. The team will review your equipment and confirm suitable options and availability.',
    ],
    [
        'q' => 'Can a technician visit our company or factory?',
        'a' => 'You can request On-Site Technical Assistance. We do not send an in-house crew; if a visit is suitable, we coordinate with an available technician who can accept the job. Location coverage, scope, and timing are confirmed case by case.',
    ],
    [
        'q' => 'Can you help arrange replacement components?',
        'a' => 'The team can assess the requirement and discuss suitable components or sourcing where feasible. Compatibility, availability, and cost must be confirmed before approval.',
    ],
    [
        'q' => 'Can I request a custom technical task?',
        'a' => 'Yes. Choose Custom Technical Tasks & Project Support and describe the goal, equipment, location, and any known requirements. Feasibility and arrangements are reviewed first.',
    ],
    [
        'q' => 'Do you sell or deliver spare parts?',
        'a' => 'EnergyHub currently focuses on technical services and does not promise ready-stock parts or instant delivery. Component procurement can be discussed when relevant and is confirmed case by case.',
    ],
    [
        'q' => 'How are service availability and pricing confirmed?',
        'a' => 'After reviewing your request, the team discusses feasible next steps, availability, scope, and applicable costs. Work proceeds only after arrangements are agreed.',
    ],
    [
        'q' => 'What information should I provide?',
        'a' => 'Include your equipment type and model if known, symptoms or task details, site location for on-site requests, photos if useful, and your preferred contact method.',
    ],
];

$about = [
    'intro'    => 'EnergyHub Services helps customers make sense of technical requirements for electrical equipment, energy-monitoring devices, and related systems. We start by understanding the equipment and the issue, then review what support may be practical. The exact service, location coverage, materials, and schedule are confirmed for each request.',
    'mission'  => 'Make it easier to explain a technical issue, understand the available options, and agree on a clear next step.',
    'values'   => [
        'Listen first: understand the equipment, issue, and outcome you need.',
        'Explain the proposed scope, availability, and applicable costs clearly.',
        'Review compatibility and feasibility before discussing repair or parts.',
        'Agree on the work and arrangements before proceeding.',
    ],
    'approach' => 'Every request starts with the details: what equipment is involved, what you have noticed, where support is needed, and what outcome you are looking for. We review feasibility and availability, discuss any materials or site arrangements, and confirm applicable costs and scope before work is agreed.',
];
?>
