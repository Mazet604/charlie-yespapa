<template>
    <AppLayout>
        <div class="w-full">
            <h1 class="mb-4 text-3xl font-bold">OTHER INFO</h1>
            <TabView v-model:activeIndex="activeTab" class="no-background">
                <TabPanel header="CS ELIGIBILITY">
                    <DataTable :value="cseligibilityData" class="mt-8" :paginator="true" :rows="5">
                        <Column field="service" header="CAREER SERVICE/RA 1080 (BOARD/BAR) UNDER SPECIAL LAWS/CES/CSEE/BARANGAY ELIGIBILITY/DRIVERS LICENSE"></Column>
                        <Column field="rating" header="RATING (IF APPLICABLE)"></Column>
                        <Column field="dateOfExam" header="DATE OF EXAMINATION/CONFERMENT"></Column>
                        <Column field="placeOfExam" header="PLACE OF EXAMINATION/CONFERMENT"></Column>
                        <Column field="license" header="LICENSE (IF APPLICABLE)"></Column>
                        <Column field="validity" header="VALIDITY"></Column>
                    </DataTable>
                    <div class="flex justify-end gap-4 mt-6">
                        <Button label="ADD" class="px-8 py-2 text-white bg-blue-500 rounded-lg" @click="confirmAdd" />
                        <Button label="UPDATE" class="px-8 py-2 text-white bg-green-500 rounded-lg" @click="confirmUpdate" />
                    </div>
                </TabPanel>
                <TabPanel header="VOLUNTARY WORK">
                    <DataTable :value="voluntaryworkData" class="mt-8" :paginator="true" :rows="5">
                        <Column field="name" header="NAME & ADDRESS OF ORGANIZATION (WRITE IN FULL)"></Column>
                        <Column field="from" header="INCLUSIVE DATES (MM/DD/YYYY) FROM"></Column>
                        <Column field="to" header="INCLUSIVE DATES (MM/DD/YYYY) TO"></Column>
                        <Column field="hours" header="NUMBER OF HOURS"></Column>
                        <Column field="position" header="POSITION / NATURE OF WORK"></Column>
                    </DataTable>
                    <div class="flex justify-end gap-4 mt-6">
                        <Button label="ADD" class="px-8 py-2 text-white bg-blue-500 rounded-lg" @click="confirmAdd" />
                        <Button label="UPDATE" class="px-8 py-2 text-white bg-green-500 rounded-lg" @click="confirmUpdate" />
                    </div>
                </TabPanel>
                <TabPanel header="LEARNING & DEVELOPMENT">
                    <DataTable :value="learndevData" class="mt-8" :paginator="true" :rows="5">
                        <Column field="title" header="TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAM (WRITE IN FULL)"></Column>
                        <Column field="from" header="INCLUSIVE DATES (MM/DD/YYYY) FROM"></Column>
                        <Column field="to" header="INCLUSIVE DATES (MM/DD/YYYY) TO"></Column>
                        <Column field="hours" header="NUMBER OF HOURS"></Column>
                        <Column field="type" header="TYPE OF LD (MANAGERIAL/SUPERVISORY/TECHNICAL/ETC)"></Column>
                        <Column field="conducted" header="CONDUCTED/SPONSORED BY (WRITE IN FULL)"></Column>
                    </DataTable>
                    <div class="flex justify-end gap-4 mt-6">
                        <Button label="ADD" class="px-8 py-2 text-white bg-blue-500 rounded-lg" @click="confirmAdd" />
                        <Button label="UPDATE" class="px-8 py-2 text-white bg-green-500 rounded-lg" @click="confirmUpdate" />
                    </div>
                </TabPanel>
                <TabPanel header="GOVERNMENT ID">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="border-box">
                            <div>
                                <label class="label-field">SSS ID:</label>
                                <input class="input-field" type="text" v-model="governmentIdFields.sssId" />
                            </div>
                            <div>
                                <label class="label-field">PAG-IBIG ID:</label>
                                <input class="input-field" type="text" v-model="governmentIdFields.pagIbigId" />
                            </div>
                            <div>
                                <label class="label-field">TIN ID:</label>
                                <input class="input-field" type="text" v-model="governmentIdFields.tinId" />
                            </div>
                        </div>
                        <div class="border-box">
                            <div>
                                <label class="label-field">GSIS ID:</label>
                                <input class="input-field" type="text" v-model="governmentIdFields.gsisId" />
                            </div>
                            <div>
                                <label class="label-field">PHILHEALTH ID:</label>
                                <input class="input-field" type="text" v-model="governmentIdFields.philHealthId" />
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="border-box">
                            <div>
                                <label class="label-field">GOV'T. ISSUED ID:</label>
                                <input class="input-field" type="text" v-model="governmentIdFields.govIssuedId" />
                            </div>
                            <div>
                                <label class="label-field">DATE ISSUED:</label>
                                <input class="input-field" type="date" v-model="governmentIdFields.dateIssued" />
                            </div>
                        </div>
                        <div class="border-box">
                            <div>
                                <label class="label-field">ID/LICENSE/PASSPORT NO.:</label>
                                <input class="input-field" type="text" v-model="governmentIdFields.licenseNo" />
                            </div>
                            <div>
                                <label class="label-field">PLACE OF ISSUANCE:</label>
                                <input class="input-field" type="text" v-model="governmentIdFields.placeIssued" />
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-4 mt-6">
                        <Button label="UPDATE" class="px-8 py-2 text-white bg-green-500 rounded-lg" @click="confirmUpdate" />
                    </div>
                </TabPanel>
                <TabPanel header="RECOGNITION AND DISTINCTIONS">
                    <DataTable :value="recogdistData" class="mt-8" :paginator="true" :rows="5">
                        <Column field="skill" header="NON-ACADEMIC DISTINCTIONS/RESTRICTIONS"></Column>
                    </DataTable>
                    <div class="flex justify-end gap-4 mt-6">
                        <Button label="ADD" class="px-8 py-2 text-white bg-blue-500 rounded-lg" @click="confirmAdd" />
                        <Button label="UPDATE" class="px-8 py-2 text-white bg-green-500 rounded-lg" @click="confirmUpdate" />
                    </div>
                </TabPanel>
                <TabPanel header="OTHER INFORMATION">
                    <div class="other-info">
                        <div class="pagination">
                            <button @click="previousPage" :disabled="currentPage === 1">&laquo; Previous</button>
                            <button @click="nextPage" :disabled="currentPage === totalPages">Next &raquo;</button>
                        </div>
                        <div v-if="currentPage === 1">
                            <h2>34. Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of bureau or office or to the person who has immediate supervision over you in the Office, Bureau or Department where you will be appointed</h2>
                            <div class="form-group">
                                <label>a. within the third degree?</label>
                                <input type="radio" v-model="otherInfo.degree" value="Yes" /> Yes
                                <input type="radio" v-model="otherInfo.degree" value="No" /> No
                            </div>
                            <div class="form-group">
                                <label>b. within the fourth degree (for Local Government Unit - Career Employees)?</label>
                                <input type="radio" v-model="otherInfo.degreeFourth" value="Yes" /> Yes
                                <input type="text" v-model="otherInfo.degreeFourthDetails" placeholder="If YES, give details" />
                                <input type="radio" v-model="otherInfo.degreeFourth" value="No" /> No
                            </div>
                        </div>
                        <div v-if="currentPage === 2">
                            <h2>35. a. Have you ever been found guilty of any administrative offense?</h2>
                            <div class="form-group">
                                <input type="radio" v-model="otherInfo.adminOffense" value="Yes" /> Yes
                                <input type="text" v-model="otherInfo.adminOffenseDetails" placeholder="If YES, give details" />
                                <input type="radio" v-model="otherInfo.adminOffense" value="No" /> No
                            </div>
                            <h2>b. Have you been criminally charged before any court?</h2>
                            <div class="form-group">
                                <input type="radio" v-model="otherInfo.criminalCharge" value="Yes" /> Yes
                                <input type="text" v-model="otherInfo.criminalChargeDetails" placeholder="If YES, give details" />
                                <input type="date" v-model="otherInfo.dateFiled" placeholder="Date Filed" />
                                <input type="text" v-model="otherInfo.statusOfCase" placeholder="Status of Case/s" />
                                <input type="radio" v-model="otherInfo.criminalCharge" value="No" /> No
                            </div>
                        </div>
                        <div v-if="currentPage === 3">
                            <h2>36. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</h2>
                            <div class="form-group">
                                <input type="radio" v-model="otherInfo.convictedCrime" value="Yes" /> Yes
                                <input type="text" v-model="otherInfo.convictedCrimeDetails" placeholder="If YES, give details" />
                                <input type="radio" v-model="otherInfo.convictedCrime" value="No" /> No
                            </div>
                            <h2>37. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?</h2>
                            <div class="form-group">
                                <input type="radio" v-model="otherInfo.separatedService" value="Yes" /> Yes
                                <input type="text" v-model="otherInfo.separatedServiceDetails" placeholder="If YES, give details" />
                                <input type="radio" v-model="otherInfo.separatedService" value="No" /> No
                            </div>
                        </div>
                        <div v-if="currentPage === 4">
                            <h2>38. a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?</h2>
                            <div class="form-group">
                                <input type="radio" v-model="otherInfo.candidateElection" value="Yes" /> Yes
                                <input type="text" v-model="otherInfo.candidateElectionDetails" placeholder="If YES, give details" />
                                <input type="radio" v-model="otherInfo.candidateElection" value="No" /> No
                            </div>
                            <h2>b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?</h2>
                            <div class="form-group">
                                <input type="radio" v-model="otherInfo.resignedGovtService" value="Yes" /> Yes
                                <input type="text" v-model="otherInfo.resignedGovtServiceDetails" placeholder="If YES, give details" />
                                <input type="radio" v-model="otherInfo.resignedGovtService" value="No" /> No
                            </div>
                        </div>
                        <div v-if="currentPage === 5">
                            <h2>39. Have you acquired the status of an immigrant or permanent resident of another country?</h2>
                            <div class="form-group">
                                <input type="radio" v-model="otherInfo.immigrantStatus" value="Yes" /> Yes
                                <input type="text" v-model="otherInfo.immigrantStatusDetails" placeholder="If YES, give details" />
                                <input type="radio" v-model="otherInfo.immigrantStatus" value="No" /> No
                            </div>
                            <h2>40. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</h2>
                            <div class="form-group">
                                <label>a. Are you a member of any indigenous group?</label>
                                <input type="radio" v-model="otherInfo.indigenousGroup" value="Yes" /> Yes
                                <input type="text" v-model="otherInfo.indigenousGroupDetails" placeholder="If YES, give details" />
                                <input type="radio" v-model="otherInfo.indigenousGroup" value="No" /> No
                            </div>
                            <div class="form-group">
                                <label>b. Are you a person with disability?</label>
                                <input type="radio" v-model="otherInfo.disability" value="Yes" /> Yes
                                <input type="text" v-model="otherInfo.disabilityDetails" placeholder="If YES, give details" />
                                <input type="radio" v-model="otherInfo.disability" value="No" /> No
                            </div>
                            <div class="form-group">
                                <label>c. Are you a solo parent?</label>
                                <input type="radio" v-model="otherInfo.soloParent" value="Yes" /> Yes
                                <input type="text" v-model="otherInfo.soloParentDetails" placeholder="If YES, give details" />
                                <input type="radio" v-model="otherInfo.soloParent" value="No" /> No
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end gap-4 mt-6">
                        <Button label="UPDATE" class="px-8 py-2 text-white bg-green-500 rounded-lg" @click="confirmUpdate" />
                    </div>
                </TabPanel>
            </TabView>

            <!-- Add CS Eligibility Modal -->
            <div v-if="showAddCSEligibilityDialog" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50">
                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                    <div class="p-4">
                        <div class="text-center">
                            <h2 class="text-xl font-semibold mb-4">Add CS Eligibility</h2>
                        </div>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label class="label-field">CAREER SERVICE/RA 1080</label>
                                <input class="input-field" type="text" v-model="newCSEligibility.service" />
                            </div>
                            <div>
                                <label class="label-field">RATING (IF APPLICABLE)</label>
                                <input class="input-field" type="text" v-model="newCSEligibility.rating" />
                            </div>
                            <div>
                                <label class="label-field">DATE OF EXAMINATION/CONFERMENT</label>
                                <input class="input-field" type="text" v-model="newCSEligibility.dateOfExam" />
                            </div>
                            <div>
                                <label class="label-field">PLACE OF EXAMINATION/CONFERMENT</label>
                                <input class="input-field" type="text" v-model="newCSEligibility.placeOfExam" />
                            </div>
                            <div>
                                <label class="label-field">LICENSE (IF APPLICABLE)</label>
                                <input class="input-field" type="text" v-model="newCSEligibility.license" />
                            </div>
                            <div>
                                <label class="label-field">VALIDITY</label>
                                <input class="input-field" type="text" v-model="newCSEligibility.validity" />
                            </div>
                        </div>
                        <div class="flex justify-center gap-4 mt-4">
                            <button @click="hideAddCSEligibilityDialog" class="py-2 px-4 rounded bg-gray-300 text-gray-700 hover:bg-gray-400">
                                Cancel
                            </button>
                            <button @click="addCSEligibility" class="py-2 px-4 rounded bg-blue-600 text-white hover:bg-blue-700">
                                Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Voluntary Work Modal -->
            <div v-if="showAddVoluntaryWorkDialog" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50">
                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                    <div class="p-4">
                        <div class="text-center">
                            <h2 class="text-xl font-semibold mb-4">Add Voluntary Work</h2>
                        </div>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label class="label-field">NAME & ADDRESS OF ORGANIZATION (WRITE IN FULL)</label>
                                <input class="input-field" type="text" v-model="newVoluntaryWork.name" />
                            </div>
                            <div>
                                <label class="label-field">INCLUSIVE DATES (MM/DD/YYYY) FROM</label>
                                <input class="input-field" type="text" v-model="newVoluntaryWork.from" />
                            </div>
                            <div>
                                <label class="label-field">INCLUSIVE DATES (MM/DD/YYYY) TO</label>
                                <input class="input-field" type="text" v-model="newVoluntaryWork.to" />
                            </div>
                            <div>
                                <label class="label-field">NUMBER OF HOURS</label>
                                <input class="input-field" type="text" v-model="newVoluntaryWork.hours" />
                            </div>
                            <div>
                                <label class="label-field">POSITION / NATURE OF WORK</label>
                                <input class="input-field" type="text" v-model="newVoluntaryWork.position" />
                            </div>
                        </div>
                        <div class="flex justify-center gap-4 mt-4">
                            <button @click="hideAddVoluntaryWorkDialog" class="py-2 px-4 rounded bg-gray-300 text-gray-700 hover:bg-gray-400">
                                Cancel
                            </button>
                            <button @click="addVoluntaryWork" class="py-2 px-4 rounded bg-blue-600 text-white hover:bg-blue-700">
                                Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Learning & Development Modal -->
            <div v-if="showAddLearndevDialog" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50">
                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                    <div class="p-4">
                        <div class="text-center">
                            <h2 class="text-xl font-semibold mb-4">Add Learning & Development</h2>
                        </div>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label class="label-field">TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAM (WRITE IN FULL)</label>
                                <input class="input-field" type="text" v-model="newLearndev.title" />
                            </div>
                            <div>
                                <label class="label-field">INCLUSIVE DATES (MM/DD/YYYY) FROM</label>
                                <input class="input-field" type="text" v-model="newLearndev.from" />
                            </div>
                            <div>
                                <label class="label-field">INCLUSIVE DATES (MM/DD/YYYY) TO</label>
                                <input class="input-field" type="text" v-model="newLearndev.to" />
                            </div>
                            <div>
                                <label class="label-field">NUMBER OF HOURS</label>
                                <input class="input-field" type="text" v-model="newLearndev.hours" />
                            </div>
                            <div>
                                <label class="label-field">TYPE OF LD (MANAGERIAL/SUPERVISORY/TECHNICAL/ETC)</label>
                                <input class="input-field" type="text" v-model="newLearndev.type" />
                            </div>
                            <div>
                                <label class="label-field">CONDUCTED/SPONSORED BY (WRITE IN FULL)</label>
                                <input class="input-field" type="text" v-model="newLearndev.conducted" />
                            </div>
                        </div>
                        <div class="flex justify-center gap-4 mt-4">
                            <button @click="hideAddLearndevDialog" class="py-2 px-4 rounded bg-gray-300 text-gray-700 hover:bg-gray-400">
                                Cancel
                            </button>
                            <button @click="addLearndev" class="py-2 px-4 rounded bg-blue-600 text-white hover:bg-blue-700">
                                Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add Recognition & Distinctions Modal -->
            <div v-if="showAddRecogdistDialog" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50">
                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                    <div class="p-4">
                        <div class="text-center">
                            <h2 class="text-xl font-semibold mb-4">Add Recognition & Distinctions</h2>
                        </div>
                        <div class="grid grid-cols-1 gap-4">
                            <div>
                                <label class="label-field">NON-ACADEMIC DISTINCTIONS/RESTRICTIONS</label>
                                <input class="input-field" type="text" v-model="newRecogdist.skill" />
                            </div>
                        </div>
                        <div class="flex justify-center gap-4 mt-4">
                            <button @click="hideAddRecogdistDialog" class="py-2 px-4 rounded bg-gray-300 text-gray-700 hover:bg-gray-400">
                                Cancel
                            </button>
                            <button @click="addRecogdist" class="py-2 px-4 rounded bg-blue-600 text-white hover:bg-blue-700">
                                Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Confirmation Modal -->
            <div v-if="showUpdateDialog" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50">
                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-md w-full p-6 text-center">
                    <i class="fas fa-exclamation-triangle text-4xl mb-4" style="color: red;"></i>
                    <h2 class="text-xl font-semibold mb-4">Are you sure you want to update?</h2>
                    <p class="mb-4">If you are certain, click 'Confirm' to proceed. Otherwise, click 'Cancel' to go back and review the information.</p>
                    <div class="flex justify-center gap-4">
                        <button @click="hideUpdateDialog" class="py-2 px-4 rounded bg-gray-300 text-gray-700 hover:bg-gray-400">
                            Cancel
                        </button>
                        <button @click="updateProfile" class="py-2 px-4 rounded bg-red-600 text-white hover:bg-red-700">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>

            <!-- Update Success Modal -->
            <div v-if="showSuccessDialog" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50">
                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full">
                    <div class="p-4">
                        <div class="text-center">
                            <i class="fas fa-check-circle text-4xl mb-4" style="color: green;"></i>
                            <h2 class="text-xl font-semibold mb-4">Updated Successfully!</h2>
                            <p class="mb-4">Details have been successfully updated. Press 'Back' to continue.</p>
                        </div>
                        <div class="flex justify-center">
                            <button @click="hideSuccessDialog" class="py-2 px-4 rounded bg-blue-600 text-white hover:bg-blue-700">
                                Back
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3';
import Button from 'primevue/button';
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import AppLayout from '@/Layouts/AppLayout.vue';

const activeTab = ref(0);

const cseligibilityData = ref([
    { service: 'Service 1', rating: '95%', dateOfExam: '2021-01-01', placeOfExam: 'Place 1', license: '12345', validity: '2023-01-01' },
    { service: 'Service 2', rating: '90%', dateOfExam: '2020-01-01', placeOfExam: 'Place 2', license: '67890', validity: '2022-01-01' },
]);

const voluntaryworkData = ref([
    { name: 'Organization 1', from: '2021-01-01', to: '2021-06-01', hours: 100, position: 'Volunteer' },
    { name: 'Organization 2', from: '2020-01-01', to: '2020-06-01', hours: 200, position: 'Coordinator' },
]);

const learndevData = ref([
    { title: 'Program 1', from: '2021-01-01', to: '2021-06-01', hours: 40, type: 'Managerial', conducted: 'Company A' },
    { title: 'Program 2', from: '2020-01-01', to: '2020-06-01', hours: 30, type: 'Supervisory', conducted: 'Company B' },
]);

const recogdistData = ref([
    { skill: 'Distinction 1' },
    { skill: 'Distinction 2' },
]);

const governmentIdFields = ref({
    sssId: '09223512331',
    gsisId: '272-2034',
    pagIbigId: '09223512331',
    philHealthId: '272-2034',
    tinId: '09223512331',
    govIssuedId: 'DSWD EMPLOYEE ID',
    dateIssued: '2024-07-24',
    licenseNo: '272-2034',
    placeIssued: 'QUEZON CITY'
});

const showUpdateDialog = ref(false);
const showAddCSEligibilityDialog = ref(false);
const showAddVoluntaryWorkDialog = ref(false);
const showAddLearndevDialog = ref(false);
const showAddRecogdistDialog = ref(false);
const showSuccessDialog = ref(false);

const newCSEligibility = ref({
    service: '',
    rating: '',
    dateOfExam: '',
    placeOfExam: '',
    license: '',
    validity: ''
});

const newVoluntaryWork = ref({
    name: '',
    from: '',
    to: '',
    hours: '',
    position: ''
});

const newLearndev = ref({
    title: '',
    from: '',
    to: '',
    hours: '',
    type: '',
    conducted: ''
});

const newRecogdist = ref({
    skill: ''
});

const otherInfo = ref({
    degree: '',
    degreeFourth: '',
    degreeFourthDetails: '',
    adminOffense: '',
    adminOffenseDetails: '',
    criminalCharge: '',
    criminalChargeDetails: '',
    dateFiled: '',
    statusOfCase: '',
    convictedCrime: '',
    convictedCrimeDetails: '',
    separatedService: '',
    separatedServiceDetails: '',
    candidateElection: '',
    candidateElectionDetails: '',
    resignedGovtService: '',
    resignedGovtServiceDetails: '',
    immigrantStatus: '',
    immigrantStatusDetails: '',
    indigenousGroup: '',
    indigenousGroupDetails: '',
    disability: '',
    disabilityDetails: '',
    soloParent: '',
    soloParentDetails: ''
});

const currentPage = ref(1);
const totalPages = 5;

const nextPage = () => {
    if (currentPage.value < totalPages) {
        currentPage.value++;
    }
};

const previousPage = () => {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
};

const confirmUpdate = () => {
    showUpdateDialog.value = true;
};

const hideUpdateDialog = () => {
    showUpdateDialog.value = false;
};

const confirmAdd = () => {
    const currentTab = activeTab.value;
    if (currentTab === 0) showAddCSEligibilityDialog.value = true;
    else if (currentTab === 1) showAddVoluntaryWorkDialog.value = true;
    else if (currentTab === 2) showAddLearndevDialog.value = true;
    else if (currentTab === 4) showAddRecogdistDialog.value = true;
};

const hideAddCSEligibilityDialog = () => {
    showAddCSEligibilityDialog.value = false;
};

const hideAddVoluntaryWorkDialog = () => {
    showAddVoluntaryWorkDialog.value = false;
};

const hideAddLearndevDialog = () => {
    showAddLearndevDialog.value = false;
};

const hideAddRecogdistDialog = () => {
    showAddRecogdistDialog.value = false;
};

const hideSuccessDialog = () => {
    showSuccessDialog.value = false;
};

const updateProfile = () => {
    hideUpdateDialog();
    showSuccessDialog.value = true;
};

const addCSEligibility = () => {
    cseligibilityData.value.push({ ...newCSEligibility.value });
    hideAddCSEligibilityDialog();
    showSuccessDialog.value = true;
};

const addVoluntaryWork = () => {
    voluntaryworkData.value.push({ ...newVoluntaryWork.value });
    hideAddVoluntaryWorkDialog();
    showSuccessDialog.value = true;
};

const addLearndev = () => {
    learndevData.value.push({ ...newLearndev.value });
    hideAddLearndevDialog();
    showSuccessDialog.value = true;
};

const addRecogdist = () => {
    recogdistData.value.push({ ...newRecogdist.value });
    hideAddRecogdistDialog();
    showSuccessDialog.value = true;
};
</script>

<style scoped>
.bg-cover {
    background-size: cover;
}

.bg-center {
    background-position: center;
}

.border-box {
    padding: 1rem;
}

.input-field {
    width: 100%;
    padding: 0.5rem;
    border: 1px solid #cbd5e0;
    border-radius: 0.375rem;
    box-sizing: border-box;
    margin-top: 0.5rem;
    margin-bottom: 1rem;
}

.label-field {
    margin-bottom: 0.25rem;
}

.divider {
    width: 100%;
    height: 1px;
    background-color: #e5e7eb;
    margin: 2rem 0;
}

.pagination {
    display: flex;
    justify-content: space-between;
    margin-bottom: 1rem;
}

.form-group {
    margin-bottom: 1rem;
}

@media (max-width: 640px) {
    .fixed {
        position: static;
    }
}
</style>
