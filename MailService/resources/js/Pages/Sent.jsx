import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Sent({ auth}) {
    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <Head title="Sent" />

           
        </AuthenticatedLayout>
    );
}
