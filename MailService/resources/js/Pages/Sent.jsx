import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head } from '@inertiajs/react';
import PrimaryButton from "@/Components/PrimaryButton";
import {useForm } from "@inertiajs/react";


export default function Sent({ auth, mails, users }) {
    


    return (
        <AuthenticatedLayout
            user={auth.user}
        >
            <Head title="Sent" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    
                {mails.map((mail, i) => (
                        <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 flex p-6 text-gray-900" key={i}>
                            <div className='w-1/4'>
                                {i + 1}. Title: <b>{mail.title}</b> 
                            </div>
                            <div >
                                To: 
                                {users.map((user) => {
                                    if (user.id === mail.reciever_id) {
                                        return <b key={user.id}> {user.name}</b>;
                                    } else {
                                        return null;
                                    }
                                })}
                            </div>
                            
                            
                            <form  className="ml-auto" action="/delete_sender_mail" method="GET">
                            <input type="hidden" name="mailId" value={mail.id} required class='ml-14 rounded-lg sr-only'/>
                            <PrimaryButton className="ml-auto bg-red-500 hover:bg-red-600 " >Delete</PrimaryButton>
                            </form>
                        </div>
                    ))}
                  
               
               
                
                        
                   
                </div>
            </div>

           
        </AuthenticatedLayout>
    );
}
