import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';

export default function Inbox({ auth, mails }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <Head title="Inbox" />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    
                    {mails.map((mail, i) =>(
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 flex p-6 text-gray-900" key={i}>
                        <div className='w-1/4 '>{i+1}. Sender: <b>{mail.sender_mail}</b></div> <div>Title: <b>{mail.title}</b> </div>
                    </div> 
                  
                ))}
                        
                   
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
