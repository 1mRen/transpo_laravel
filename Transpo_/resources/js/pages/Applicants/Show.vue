<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';

defineOptions({ layout: AppLayout });

const props = defineProps<{ applicant: any }>();
</script>

<template>
    <AppLayout>
        <div class="p-6 max-w-lg mx-auto bg-white shadow-md rounded-md">
            <h2 class="text-xl font-bold mb-4">Applicant Details</h2>

            <p><strong>Full Name:</strong> {{ props.applicant.full_name }}</p>
            <p><strong>Organization/Department:</strong> {{ props.applicant.organization_department }}</p>
            <p><strong>Position:</strong> {{ props.applicant.position }}</p>
            <p><strong>Contact No:</strong> {{ props.applicant.contact_no }}</p>
            <p><strong>Email:</strong> {{ props.applicant.email }}</p>
        </div>
    </AppLayout>
</template>
