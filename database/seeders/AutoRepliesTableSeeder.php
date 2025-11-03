<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AutoRepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('auto_replies')->insert([
            [
                'trigger' => 'hello',
                'response' => 'Hi there! How can I assist you and your pet today? 🐾',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'hi',
                'response' => 'Hello! Welcome to our veterinary clinic. How can I help you?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'good morning',
                'response' => 'Good morning! Hope you and your furry friend are doing well. How can I assist?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'good afternoon',
                'response' => 'Good afternoon! How can I help your pet today?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'price',
                'response' => 'Our service prices vary by treatment. Could you please specify what service you’re inquiring about?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'schedule',
                'response' => 'Appointments are available from Monday to Saturday, 9 AM to 5 PM. Would you like to schedule one?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'appointment',
                'response' => 'To set an appointment, please provide your pet’s name, preferred date, and time. 🗓️',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'vaccine',
                'response' => 'We offer vaccinations for dogs and cats. Would you like to know the available dates and prices?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'grooming',
                'response' => 'Yes! We provide grooming services for pets of all sizes. Would you like to book a session?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'checkup',
                'response' => 'Regular checkups are important! We can schedule one anytime between 9 AM and 5 PM.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'doctor',
                'response' => 'Our veterinarians are available throughout the week. May I know your preferred date for consultation?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'open',
                'response' => 'Our clinic is open from Monday to Saturday, 9 AM to 5 PM. 🐶🐱',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'location',
                'response' => 'We are located at Purok 2, Barangay Damayan, near the town center. 📍',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'emergency',
                'response' => 'If this is an emergency, please call (02) 1234-5678 or visit us immediately!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'thank',
                'response' => 'You’re welcome! 🐾 We’re happy to help you and your pet anytime.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'bye',
                'response' => 'Goodbye! Take care and give your pet some love from us! 💖',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'service',
                'response' => 'We offer vaccinations, deworming, grooming, checkups, and more. Which one interests you?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'payment',
                'response' => 'We accept cash, GCash, and major credit cards. 💳',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'hours',
                'response' => 'Our business hours are 9:00 AM to 5:00 PM, Monday through Saturday.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'contact',
                'response' => 'You can reach us at (02) 1234-5678 or message us here anytime!',
                'created_at' => now(),
                'updated_at' => now(),
            ], [
                'trigger' => 'deworming',
                'response' => 'We provide deworming services for both cats and dogs. Would you like to set an appointment for that?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'adopt',
                'response' => 'That’s wonderful! 🐶🐱 We sometimes have pets available for adoption. Would you like to know more?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'lost pet',
                'response' => 'I’m sorry to hear that! 😢 Please provide your pet’s name, breed, and last seen location so we can help.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'lost',
                'response' => 'If you’ve lost your pet, send us a photo and details so we can assist in spreading the word. 🐾',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'found',
                'response' => 'Thank you for helping! Please share the pet’s description or photo so we can locate the owner.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'spay',
                'response' => 'We offer spaying and neutering services. Would you like to know the available schedule and pricing?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'neuter',
                'response' => 'Neutering helps keep pets healthy and prevent unwanted litters. Want to set a schedule?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'urgent',
                'response' => 'If your pet needs urgent care, please call our emergency hotline or visit us immediately!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'clinic hours',
                'response' => 'We’re open from 9 AM to 5 PM, Monday through Saturday. Closed on Sundays and holidays. ⏰',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trigger' => 'vaccination record',
                'response' => 'You can request your pet’s vaccination record at the clinic or message us for verification. 📋',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
