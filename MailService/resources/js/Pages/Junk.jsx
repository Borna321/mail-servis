import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Junk({ auth}) {
    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <Head title="Junk" />

           
        </AuthenticatedLayout>
    );
}