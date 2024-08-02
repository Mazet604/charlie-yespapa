<template>
  <AppLayout>
    <div class="grid w-full grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
      <div class="col-span-1 relative">
        <div class="relative group" @mouseenter="isHovered = true" @mouseleave="isHovered = false">
          <img alt="Profile Picture" class="w-full rounded-lg" height="300" src="/images/profile-picture.webp" width="300" :class="{ 'blur-md': !isUnblurred }" />
          <div class="absolute inset-0 flex items-center justify-center transition-opacity duration-300" :class="{ 'opacity-0': !isHovered, 'opacity-100': isHovered }">
            <button @click="toggleBlur" class="p-2 bg-gray-800 bg-opacity-75 rounded-full">
              <i class="fas fa-eye text-white text-4xl"></i>
            </button>
          </div>
        </div>
        <Button label="Upload Photo" class="w-full py-2 mt-4 text-white rounded-lg bg-gradient-to-r from-pink-500 to-purple-500" />
      </div>
      <div class="col-span-1 md:col-span-2">
        <h1 class="mb-4 text-3xl lg:text-5xl font-bold">{{ fullName }}</h1>
        <p class="mb-4 text-gray-600">{{ empPosition }}</p>
        <div class="border-box">
          <TabView v-model:activeIndex="activeTab" class="no-background">
            <TabPanel header="PERSONAL INFO">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">USER NAME</label>
                  <input type="text" class="input-field" v-model="fields.empUser" disabled />
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">EMPLOYEE ID</label>
                  <input type="text" class="input-field" v-model="fields.empID" disabled  />
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">FIRST NAME</label>
                  <input type="text" class="input-field" v-model="fields.firstName" />
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">MIDDLE NAME</label>
                  <input type="text" class="input-field" v-model="fields.middleName" />
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">LAST NAME</label>
                  <input type="text" class="input-field" v-model="fields.lastName" />
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">SUFFIX</label>
                  <select class="input-field" v-model="fields.suffix">
                    <option v-for="option in extOptions" :key="option.value" :value="option.value">{{ option.label }}</option>
                  </select>
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">CITIZENSHIP</label>
                  <input type="text" class="input-field" v-model="fields.citizenship" />
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">BIRTHDAY</label>
                  <input type="date" class="input-field" v-model="fields.birthday" />
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">PLACE OF BIRTH</label>
                  <input type="text" class="input-field" v-model="fields.placeOfBirth" />
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">SEX</label>
                  <select class="input-field" v-model="fields.sex">
                    <option v-for="option in sexOptions" :key="option.value" :value="option.value">{{ option.label }}</option>
                  </select>
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">CIVIL STATUS</label>
                  <select class="input-field" v-model="fields.civilStatus">
                    <option v-for="option in civilStatusOptions" :key="option.value" :value="option.value">{{ option.label }}</option>
                  </select>
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">HEIGHT(M)</label>
                  <input type="number" step="0.01" class="input-field" v-model="fields.height" />
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">WEIGHT(KG)</label>
                  <input type="number" class="input-field" v-model="fields.weight" />
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">BLOOD TYPE</label>
                  <select class="input-field" v-model="fields.bloodType">
                    <option v-for="option in bloodTypeOptions" :key="option.value" :value="option.value">{{ option.label }}</option>
                  </select>
                </div>
              </div>
            </TabPanel>
            <TabPanel header="ADDRESS">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">REGION</label>
                  <select class="input-field" v-model="selectedRegion">
                    <option v-for="option in regionOptions" :key="option.value" :value="option.value">{{ option.label }}</option>
                  </select>
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">PROVINCE</label>
                  <select class="input-field" v-model="selectedProvince">
                    <option v-for="option in provinceOptions" :key="option.value" :value="option.value">{{ option.label }}</option>
                  </select>
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">CITY</label>
                  <select class="input-field" v-model="selectedCity">
                    <option v-for="option in cityOptions" :key="option.value" :value="option.value">{{ option.label }}</option>
                  </select>
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">ZIP CODE</label>
                  <input type="text" class="input-field" v-model="fields.zipcode" />
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">BLOCK/STREET/PUROK</label>
                  <input type="text" class="input-field" v-model="fields.block" />
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">VILLAGE SUBDIVISION</label>
                  <input type="text" class="input-field" v-model="fields.villsub" />
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">BARANGAY</label>
                  <select class="input-field" v-model="selectedBarangay">
                    <option v-for="option in barangayOptions" :key="option.value" :value="option.value">{{ option.label }}</option>
                  </select>
                </div>
              </div>
            </TabPanel>
            <TabPanel header="SECURITY & CONTACT DETAILS">
              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">MOBILE NUMBER</label>
                  <input type="text" class="input-field" v-model="fields.mobilenum" />
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">TELEPHONE NUMBER</label>
                  <input type="text" class="input-field" v-model="fields.telnum" />
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">EMAIL ADDRESS</label>
                  <input type="text" class="input-field" v-model="fields.emailadd" />
                </div>
                <div>
                  <label class="block mb-2 text-sm font-bold text-gray-700">PASSWORD</label>
                  <input :type="showPassword ? 'text' : 'password'" class="input-field" v-model="fields.pass" />
                  <div class="mt-2">
                    <input type="checkbox" id="showPassword" v-model="showPassword">
                    <label for="showPassword" class="ml-2 text-sm font-bold text-gray-700">Show Password</label>
                  </div>
                </div>
              </div>
            </TabPanel>
          </TabView>
        </div>
        <Button label="UPDATE" class="float-right px-8 py-2 mt-6 text-white bg-green-500 rounded-lg update-button" @click="confirmUpdate" />
      </div>
    </div>

    <!-- Update Confirmation Modal -->
    <div v-if="showUpdateDialog" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50">
      <div class="bg-white rounded-lg overflow-hidden transform transition-all max-w-lg w-full">
        <div class="p-4">
          <div class="text-center">
            <i class="fas fa-exclamation-triangle text-4xl mb-4" style="color: red;"></i>
            <h2 class="text-xl font-semibold mb-4">Are you sure you want to update?</h2>
            <p class="mb-4">If you are certain, click 'Confirm' to proceed. Otherwise, click 'Cancel' to go back and review the information.</p>
          </div>
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
    </div>

    <!-- Update Success Modal -->
    <div v-if="showSuccessDialog" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-75 z-50">
      <div class="bg-white rounded-lg overflow-hidden transform transition-all max-w-lg w-full">
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
  </AppLayout>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      fullName: '',
      empPosition: '',
      fields: {
        empUser: '',
        empID: '',
        firstName: '',
        middleName: '',
        lastName: '',
        suffix: '',
        citizenship: '',
        birthday: '',
        placeOfBirth: '',
        sex: '',
        civilStatus: '',
        height: '',
        weight: '',
        bloodType: '',
        zipcode: '',
        block: '',
        villsub: '',
        mobilenum: '',
        telnum: '',
        emailadd: '',
        pass: '',
      },
      errorMessage: '',
    };
  },
  methods: {
    async fetchFullName() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/employee/fullname');
        this.fullName = response.data.fullName;
        this.empPosition = response.data.empPosition;
      } catch (error) {
        if (error.response && error.response.status === 500) {
          this.errorMessage = 'Internal Server Error. Please try again later.';
        } else {
          this.errorMessage = 'An error occurred. Please try again.';
        }
      }
    },

    async fetchPersonalInfo() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/employee/PersonalInfo');
        this.fields.empUser = response.data.empUser;
        this.fields.empID = response.data.empID;
        this.fields.firstName = response.data.firstName;
        this.fields.middleName = response.data.middleName;
        this.fields.lastName = response.data.lastName;
        this.fields.suffix = response.data.suffix;
        this.fields.citizenship = response.data.citizenship;
        this.fields.birthday = response.data.birthday;
        this.fields.placeOfBirth = response.data.placeOfBirth;
        this.fields.sex = response.data.sex;
        this.fields.civilStatus = response.data.civilStatus;
        this.fields.height = response.data.height;
        this.fields.weight = response.data.weight;
        this.fields.bloodType = response.data.bloodType;
      } catch (error) {
        if (error.response && error.response.status === 500) {
          this.errorMessage = 'Internal Server Error. Please try again later.';
        } else {
          this.errorMessage = 'An error occurred. Please try again.';
        }
      }
    },
    
    async fetchSecurityandContact() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/employee/SecurityandContact');
        this.fields.mobilenum = response.data.mobilenum;
        this.fields.telnum = response.data.telnum;
        this.fields.emailadd = response.data.emailadd;
        this.fields.pass = response.data.pass;
      } catch (error) {
        if (error.response && error.response.status === 500) {
          this.errorMessage = 'Internal Server Error. Please try again later.';
        } else {
          this.errorMessage = 'An error occurred. Please try again.';
        }
      }
    },
  },
  mounted() {
    this.fetchFullName();
    this.fetchPersonalInfo();
    this.fetchSecurityandContact();
  }
};
</script>

<script setup>
import { ref } from 'vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import Button from 'primevue/button';
import TabView from 'primevue/tabview';
import TabPanel from 'primevue/tabpanel';

const activeTab = ref(0);

const extOptions = ref([
  { label: 'N/A', value: 'N/A' },
  { label: 'JR.', value: 'JR.' },
  { label: 'SR.', value: 'SR.' }
]);

const sexOptions = ref([
  { label: 'MALE', value: 'MALE' },
  { label: 'FEMALE', value: 'FEMALE' }
]);

const civilStatusOptions = ref([
  { label: 'SINGLE', value: 'SINGLE' },
  { label: 'MARRIED', value: 'MARRIED' },
  { label: 'DIVORCED', value: 'DIVORCED' },
  { label: 'WIDOWED', value: 'WIDOWED' }
]);

const bloodTypeOptions = ref([
  { label: 'O+', value: 'O+' },
  { label: 'A+', value: 'A+' },
  { label: 'B+', value: 'B+' },
  { label: 'AB+', value: 'AB+' },
  { label: 'O-', value: 'O-' },
  { label: 'A-', value: 'A-' },
  { label: 'B-', value: 'B-' },
  { label: 'AB-', value: 'AB-' }
]);

const regionOptions = ref([
  { label: 'REGION I', value: 'REGION I' },
  { label: 'REGION II', value: 'REGION II' },
  { label: 'REGION III', value: 'REGION III' },
  { label: 'REGION IV', value: 'REGION IV' },
  { label: 'REGION V', value: 'REGION V' },
  { label: 'REGION VI', value: 'REGION VI' },
  { label: 'REGION VII', value: 'REGION VII' },
  { label: 'REGION VIII', value: 'REGION VIII' },
  { label: 'REGION IX', value: 'REGION IX' },
  { label: 'REGION X', value: 'REGION X' },
  { label: 'REGION XI', value: 'REGION XI' }
]);

const provinceOptions = ref([
  { label: 'DAVAO DE ORO', value: 'DAVAO DE ORO' },
  { label: 'DAVAO DEL NORTE', value: 'DAVAO DEL NORTE' },
  { label: 'DAVAO ORIENTAL', value: 'DAVAO ORIENTAL' },
  { label: 'DAVAO DEL SUR', value: 'DAVAO DEL SUR' },
  { label: 'DAVAO OCCIDENTAL', value: 'DAVAO OCCIDENTAL' }
]);

const cityOptions = ref([
  { label: 'PANABO', value: 'PANABO' },
  { label: 'SAMAL', value: 'SAMAL' },
  { label: 'TAGUM', value: 'TAGUM' },
  { label: 'DAVAO', value: 'DAVAO' },
  { label: 'MATI', value: 'MATI' }
]);

const barangayOptions = ref([
  { label: 'MAA', value: 'MAA' },
  { label: 'MATINA', value: 'MATINA' },
  { label: 'LANGUB', value: 'LANGUB' }
]);

const selectedSex = ref(null);
const selectedCivilStatus = ref(null);
const selectedBloodType = ref(null);
const selectedRegion = ref(null);
const selectedProvince = ref(null);
const selectedCity = ref(null);
const selectedBarangay = ref(null);

const showPassword = ref(false);

const showUpdateDialog = ref(false);
const showSuccessDialog = ref(false);

const confirmUpdate = () => {
  showUpdateDialog.value = true;
};

const hideUpdateDialog = () => {
  showUpdateDialog.value = false;
};

const hideSuccessDialog = () => {
  showSuccessDialog.value = false;
};

const updateProfile = () => {
  hideUpdateDialog();
  showSuccessDialog.value = true;
};

// Blur logic
const isHovered = ref(false);
const isUnblurred = ref(false);

const toggleBlur = () => {
  isUnblurred.value = !isUnblurred.value;
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
  background: white;
  border-radius: 8px;
  padding: 20px;
  box-shadow: none;
}

.input-field {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.update-button {
  margin-bottom: 20px;
}

.blur-md {
  filter: blur(8px);
}
</style>
