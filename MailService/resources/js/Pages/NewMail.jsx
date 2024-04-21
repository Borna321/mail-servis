import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function NewMail({ auth}) {
    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <Head title="New Mail" />

           
        </AuthenticatedLayout>
    );
}